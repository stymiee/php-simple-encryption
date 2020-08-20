<?php

namespace traits;

use Encryption\Cipher\AES\Aes256ecb;
use PHPUnit\Framework\TestCase;

class DecryptNoIvTest extends TestCase
{
    public function testDecryptNoIv()
    {
        $encryptionObject = new Aes256ecb();

        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'at2CVI/8WlTnIBf3pCQo+C8u255HOZy96oDl5QaBRZdlxrONJu7qzZaL/JmzeERCK4WgRGopzze4YpWDW1jJbA==';
        self::assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key));
    }
}
