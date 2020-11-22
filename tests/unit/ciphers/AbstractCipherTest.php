<?php

namespace ciphers;

use Encryption\Cipher\ACipher;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Encryption;
use PHPUnit\Framework\TestCase;

class AbstractCipherTest extends TestCase
{
    public function testGetName(): void
    {
        $cipher = 'AES-128-ECB';
        $encryptionObject = Encryption::getEncryptionObject($cipher);
        self::assertEquals($cipher, $encryptionObject->getName());
    }

    public function testGetPaddedText(): void
    {
        $getPaddedText = new \ReflectionMethod(ACipher::class, 'getPaddedText');
        $getPaddedText->setAccessible(true);

        self::assertEquals(8, strlen($getPaddedText->invokeArgs(new Aes256cbc(), ['four', 8])));
        self::assertEquals(16, strlen($getPaddedText->invokeArgs(new Aes256cbc(), ['twelvetwelve', 8])));
    }

    public function testDebugInfo(): void
    {
        self::markTestSkipped('Cannot test ACipher::__debugInfo() due to xdebug conflict');
        $encryptionObject = Encryption::getEncryptionObject('AES-256-CBC');
        ob_start();
        var_dump($encryptionObject);
        $debugInfo = ob_get_clean();

        self::assertStringContainsString(Aes256cbc::class, $debugInfo);
        self::assertStringContainsString('["blockSize"]=>', $debugInfo);
        self::assertStringContainsString('int(8)', $debugInfo);
        self::assertStringContainsString('["cipher"]=>', $debugInfo);
        self::assertStringContainsString('string(11) "AES-256-CBC"', $debugInfo);
        self::assertStringContainsString('["ivLength"]=>', $debugInfo);
        self::assertStringContainsString('int(16)', $debugInfo);
    }

    public function testCall(): void
    {
        $this->expectExceptionMessage(
            'SM4-ECB does not require an initialization vector (IV). Do not call Encryption::generateIv().'
        );
        $encryption = Encryption::getEncryptionObject('sm4-ecb');
        $encryption->generateIv();
    }
}
