<?php

namespace traits;

use Encryption\Cipher\AES\Aes192gcm;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Exceptions\DecryptException;
use PHPUnit\Framework\TestCase;

class DecryptTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Aes256cbc();

        $iv = base64_decode('AbhK6+FK/fX0vW2FB1movw==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = '6gCmWzYeP+E5bNRfF/OgN7jAkiB7kmC20kbXXYPCBgEF/lVZNUx5OnrLct+0uq1KXGmg8N85jhSjxRustoU+ZA==';
        self::assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv));
    }

    public function testDecryptException(): void
    {
        $this->expectException(DecryptException::class);
        $this->expectExceptionMessageMatches('/^Failed to decrypt\. \[String: \] \[Cipher: AES-256-CBC\] \[Key: secretkey] \[IV:.*?/');

        $encryptionObject = new Aes256cbc();
        $iv = base64_decode('AbhK6+FK/fX0vW2FB1movw==');
        $key = 'secretkey';
        $encryptionObject->decrypt('', $key, $iv);
    }
}
