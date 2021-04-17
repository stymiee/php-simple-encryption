<?php

namespace unit;

use Encryption\Cipher\AES\Aes128ccm;
use Encryption\Cipher\DES\Descbc;
use Encryption\Encryption;
use Encryption\Exceptions\CipherNotImplementedException;
use Encryption\Exceptions\InvalidCipherException;
use Encryption\Exceptions\InvalidVersionException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class EncryptionTest extends TestCase
{
    public function testDefaultEncryptionIsAes256cbc(): void
    {
        $encryptionObject = Encryption::getEncryptionObject();
        self::assertEquals('AES-256-CBC', $encryptionObject->getName());
    }

    public function testInvalidCipherException(): void
    {
        $this->expectException(InvalidCipherException::class);
        Encryption::getEncryptionObject('invalid');
    }

    public function testCipherNotImplementedException(): void
    {
        $this->expectException(CipherNotImplementedException::class);
        Encryption::getEncryptionObject('ID-AES128-WRAP-PAD');
    }

    public function testCreateClassName(): void
    {
        $reflectedEncryptionClass = new ReflectionClass(Encryption::class);
        $createClassName = $reflectedEncryptionClass->getMethod('createClassName');
        $createClassName->setAccessible(true);

        self::assertEquals(Aes128ccm::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['aes-128-ccm']));
        self::assertEquals(Descbc::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['des-cbc']));
    }

    public function testListAvailableCiphers(): void
    {
        $availableCiphers = Encryption::listAvailableCiphers();
        self::assertIsArray($availableCiphers);
        self::assertContains('aes-128-ccm', $availableCiphers);
        self::assertContains('seed-ecb', $availableCiphers);
    }

    public function testGetDefaultCipherByVersionDefaultParameter(): void
    {
        self::assertEquals('AES-256-CBC', Encryption::getDefaultCipherByVersion());
    }

    public function testGetDefaultCipherByVersion1(): void
    {
        self::assertEquals('AES-256-CBC', Encryption::getDefaultCipherByVersion());
    }

    public function testGetDefaultCipherByVersionInvalidVersion(): void
    {
        $this->expectException(InvalidVersionException::class);
        Encryption::getDefaultCipherByVersion(2);
    }
}
