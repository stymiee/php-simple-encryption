<?php

namespace traits;


use Encryption\Cipher\ARIA\Aria128ccm;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingAeadModeTest extends TestCase
{
    public function testEncryptWithPadding()
    {
        $encryptionObject = new Aria128ccm();

        $iv = base64_decode('IrdR5KokpqpFyaKv');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = '/OlLRKtZdjtn7nA+zcZ5bDtH8NPepAK1lISpSWRZZwNLPD9jDrHM6/vzp7e/NuSf';
        $this->assertEquals($encryptedText, $encryptionObject->encrypt($plainText, $key, $iv, $tag));
        $this->assertNotEmpty($tag);
    }
}
