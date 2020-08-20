<?php

namespace traits;

use Encryption\Cipher\AES\Aes256cbc;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingTest extends TestCase
{
    public function testEncryptWithPadding()
    {
        $encryptionObject = new Aes256cbc();

        $iv = base64_decode('To+1kR3YuPfsD1e7qQNICw==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'kfH/ShrzN7njpUqX/v42hUpXHpuZZ68qK7lIPbEcF3s/yMKnJLfb1yBsbRZkysdmzTKxcMpSSxvL1AOS3Jw8WA==';
        self::assertEquals($encryptedText, $encryptionObject->encrypt($plainText, $key, $iv));
    }
}
