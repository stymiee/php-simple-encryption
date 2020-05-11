<?php

namespace traits;


use Encryption\Cipher\ID\Idaes128ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Idaes128ccm();

        $iv = base64_decode('rtfC7GSi74WuYDc2');
        $tag = base64_decode('guLJc6EUt/IvnqDkf+/Yzg==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'Q+r+mRu1frKinwp3S/WTq9A73320FrX0zR3ZigSiFZETZe7odRphosL52k0xbt5b';
        $this->assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
