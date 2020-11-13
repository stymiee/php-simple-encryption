<?php

namespace traits;


use Encryption\Cipher\ID\Idaes128ccm;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingAeadModeTest extends TestCase
{
    public function testEncryptWithPadding()
    {
        $encryptionObject = new Idaes128ccm();

        $iv = base64_decode('PXqdTEnR1dfmvurk');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'yUQfs5W+weVc3tVTHumJhFLhh5l/tpWa5SPzH8kzV/F/+cRB7y+rXdahaeTmCYH1';
        self::assertEquals($encryptedText, $encryptionObject->encrypt($plainText, $key, $iv, $tag));
        self::assertNotEmpty($tag);
    }
}
