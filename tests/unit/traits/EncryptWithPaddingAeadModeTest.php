<?php

namespace traits;

use Encryption\Cipher\AES\Aes192gcm;
use Encryption\Cipher\ID\Idaes128ccm;
use Encryption\Exceptions\EncryptException;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingAeadModeTest extends TestCase
{
    public function testEncryptWithPadding(): void
    {
        $encryptionObject = new Idaes128ccm();

        $iv = base64_decode('PXqdTEnR1dfmvurk');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = $encryptionObject->encrypt($plainText, $key, $iv, $tag);
        self::assertEquals(64, strlen($encryptedText));
        self::assertNotEmpty($tag);
    }

    public function testEncryptException(): void
    {
        $this->expectException(EncryptException::class);
        $this->expectExceptionMessageMatches(
            '/^Failed to encrypt\. \[String: \] \[Cipher: AES-192-GCM\] \[Key: secretkey] \[IV:.*?/'
        );

        $encryptionObject = new Aes192gcm();
        $iv = base64_decode('2a22ooVG8hCRML0e');
        $key = 'secretkey';
        $encryptionObject->encrypt('', $key, $iv, $tag);
    }
}
