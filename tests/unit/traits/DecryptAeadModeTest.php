<?php

namespace traits;

use Encryption\Cipher\AES\Aes128ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Aes128ccm();

        $iv = base64_decode('9TaC28fp79ry25ZZ');
        $tag = base64_decode('SF964TlJtp/hoLWGarYGJg==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'NB2aFSiWdB8frnk4vN7e/NdYZOGf+m8dsuGY5/CNroTzdij8qXbZliaBXMENsOzj';
        $this->assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
