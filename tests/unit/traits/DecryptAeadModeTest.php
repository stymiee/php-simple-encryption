<?php

namespace traits;


use Encryption\Cipher\ID\Idaes128ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Idaes128ccm();

        $iv = base64_decode('PXqdTEnR1dfmvurk');
        $tag = base64_decode('YNI2mDKuNCq7GCtghpG5+w==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'yUQfs5W+weVc3tVTHumJhFLhh5l/tpWa5SPzH8kzV/F/+cRB7y+rXdahaeTmCYH1';
        self::assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
