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
        $encryptedText = $encryptionObject->encrypt($plainText, $key, $iv, $tag);
        self::assertEquals(64, strlen($encryptedText));
        self::assertNotEmpty($tag);
    }
}
