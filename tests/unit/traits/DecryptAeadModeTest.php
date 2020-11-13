<?php

namespace traits;

use Encryption\Cipher\ID\Idaes128ccm;
use PHPUnit\Framework\TestCase;

class DecryptAeadModeTest extends TestCase
{
    public function testDecrypt()
    {
        $encryptionObject = new Idaes128ccm();

        $iv = base64_decode('apA85DhJuGNpg5E0');
        $tag = base64_decode('anmU9qpWZwUkVduRruhTSA==');
        $key = 'secretkey';
        $plainText = 'The quick brown fox jumps over the lazy dog';
        $encryptedText = 'bZJRj3Lxo02PQWM2xqCWja/dDmt+z+3XP+mwCgwREiNnFj1c77fJ2VOgIVLwdBaA';
        self::assertEquals($plainText, $encryptionObject->decrypt($encryptedText, $key, $iv, $tag));
    }
}
