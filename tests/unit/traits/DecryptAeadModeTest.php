<?php

namespace traits;


use Encryption\Cipher\ARIA\Aria128ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Aria128ccm();

        $iv = base64_decode('IrdR5KokpqpFyaKv');
        $tag = base64_decode('XpGvTrujY59NLOklwrYD2w==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = '/OlLRKtZdjtn7nA+zcZ5bDtH8NPepAK1lISpSWRZZwNLPD9jDrHM6/vzp7e/NuSf';
        $this->assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
