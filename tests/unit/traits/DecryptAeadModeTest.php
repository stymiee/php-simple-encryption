<?php

namespace traits;

use Encryption\Cipher\AES\Aes192gcm;
use Encryption\Exceptions\DecryptException;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt(): void
    {
        $encryptionObject = new Aes192gcm();

        $iv = base64_decode('2a22ooVG8hCRML0e');
        $tag = base64_decode('1FB8j0v6uY0ML1ec/weQ4Q==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'zgVtO99ZuylWxhkc2pNlBKNWD2SbQ5yqzGsbDAsNFCchQ4F5baL1crkM7kYcajAj';
        self::assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }

    public function testDecryptException(): void
    {
        $this->expectException(DecryptException::class);
        $this->expectExceptionMessageMatches('/^Failed to decrypt\. \[String: \] \[Cipher: AES-192-GCM\] \[Key: secretkey] \[IV:.*?\[Tag:.*?/');

        $encryptionObject = new Aes192gcm();
        $iv = base64_decode('2a22ooVG8hCRML0e');
        $tag = base64_decode('1FB8j0v6uY0ML1ec/weQ4Q==');
        $key = 'secretkey';
        $encryptionObject->decrypt('', $key, $iv, $tag);
    }
}
