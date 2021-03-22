<?php

namespace traits;

use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Traits\GenerateIv;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class GenerateIvTest extends TestCase
{
    public function testGenerateInsecureIv(): void
    {
        $mockTrait = $this->getMockForTrait(GenerateIv::class);
        $reflectedTrait = new ReflectionClass($mockTrait);
        $generateInsecureIv = $reflectedTrait->getMethod('generateInsecureIv');
        $generateInsecureIv->setAccessible(true);

        $length = 8;
        self::assertEquals($length, strlen($generateInsecureIv->invokeArgs($mockTrait, [$length])));
    }

    public function testGenerateIv(): void
    {
        $encryptionObject = new Aes256cbc();
        self::assertEquals(Aes256cbc::IV_LENGTH, strlen($encryptionObject->generateIv()));
    }
}
