<?php

namespace traits;

use JohnConde\Encryption\Cipher\AES\Aes256cbc;
use JohnConde\Encryption\generateIv;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class GenerateIvTest extends TestCase
{
    public function testGenerateInsecureIv()
    {
        $mockTrait = $this->getMockForTrait(generateIv::class);
        $reflectedTrait = new ReflectionClass($mockTrait);
        $generateInsecureIv = $reflectedTrait->getMethod('generateInsecureIv');
        $generateInsecureIv->setAccessible(true);

        $length = 8;
        $this->assertEquals($length, strlen($generateInsecureIv->invokeArgs($mockTrait, [$length])));
    }

    public function testGenerateIv()
    {
        $encryptionObject = new Aes256cbc();
        $this->assertEquals(Aes256cbc::IV_LENGTH, strlen($encryptionObject->generateIv()));
    }
}
