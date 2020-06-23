<?php

use Encryption\Cipher\AES\Aes128ccm;
use Encryption\Cipher\DES\Descbc;
use Encryption\Encryption;
use Encryption\Exceptions\CipherNotImplementedException;
use Encryption\Exceptions\InvalidCipherException;
use Encryption\Exceptions\InvalidVersionException;
use PHPUnit\Framework\TestCase;

class EncryptionTest extends TestCase
{
    public function testDefaultEncryptionIsAes256cbc(): void
    {
        $encryptionObject = Encryption::getEncryptionObject();
        $this->assertEquals('AES-256-CBC', $encryptionObject->getName());
    }

    public function testInvalidCipherException(): void
    {
        $this->expectException(InvalidCipherException::class);
        $encryptionObject = Encryption::getEncryptionObject('invalid');
    }

    public function testCipherNotImplementedException(): void
    {
        $this->expectException(CipherNotImplementedException::class);
        $encryptionObject = Encryption::getEncryptionObject('DES-EDE3');
    }

    public function testCreateClassName(): void
    {
        $reflectedEncryptionClass = new ReflectionClass(Encryption::class);
        $createClassName = $reflectedEncryptionClass->getMethod('createClassName');
        $createClassName->setAccessible(true);

        $this->assertEquals(Aes128ccm::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['aes-128-ccm']));
        $this->assertEquals(Descbc::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['des-cbc']));
    }

    public function testListAvailableCiphers(): void
    {
        $availableCiphers = Encryption::listAvailableCiphers();
        $this->assertIsArray($availableCiphers);
        $this->assertContains('aes-128-ccm', $availableCiphers);
        $this->assertContains('seed-ecb', $availableCiphers);
    }

    public function testGetDefaultCipherByVersionDefaultParameter(): void
    {
        $this->assertEquals('AES-256-CBC', Encryption::getDefaultCipherByVersion());
    }

    public function testGetDefaultCipherByVersion1(): void
    {
        $this->assertEquals('AES-256-CBC', Encryption::getDefaultCipherByVersion());
    }

    public function testGetDefaultCipherByVersionInvalidVersion(): void
    {
        $this->expectException(InvalidVersionException::class);
        Encryption::getDefaultCipherByVersion(2);
    }
}
