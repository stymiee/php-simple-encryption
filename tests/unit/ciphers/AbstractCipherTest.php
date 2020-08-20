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
}
