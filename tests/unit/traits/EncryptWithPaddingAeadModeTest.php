<?php

namespace traits;

use Encryption\Cipher\AES\Aes128ccm;
use PHPUnit\Framework\TestCase;

class EncryptWithPaddingAeadModeTest extends TestCase
{
    public function testEncryptWithPadding()
    {
        $encryptionObject = new Aes128ccm();

        $iv = base64_decode('d3PJDSsBCKl92zrs');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'kw++X8283DXJUCtbHIPp5AoJlYsuAPFnn+qb38uAwCScybfMsiz1x9Nianl6Z4t5';
        $this->assertEquals($encryptedText, $encryptionObject->encrypt($plainText, $key, $iv, $tag));
        $this->assertNotEmpty($tag);
    }
}
