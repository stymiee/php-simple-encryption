<?php

namespace traits;

use JohnConde\Encryption\Cipher\AES\Aes256ccm;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingAeadModeTest extends TestCase
{
    public function testEncryptWithPadding()
    {
        $encryptionObject = new Aes256ccm();

        $iv = base64_decode('05XLIaFEhJpMdgj8');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'TPS2iDizNXlFFqKlGuxcDwS224KeXDM5yliWGdI8BfW//VRaSW+38Fxi7Z55hgBS';
        $this->assertEquals($encryptedText, $encryptionObject->encrypt($plainText, $key, $iv, $tag));
        $this->assertNotEmpty($tag);
    }
}
