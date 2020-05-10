<?php

namespace traits;

use Encryption\Cipher\AES\Aes256ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Aes256ccm();

        $iv = base64_decode('a28yQoh6P482HMb6');
        $tag = base64_decode('vMTrgQnJBxuGj5HW6WxPBw==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'Z+zfXAmR/mI1pfBgjGsCDi85K7CaskhtJ4NQ44zpwVhQTz+lyh594ogepgoku4XU';
        $this->assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
