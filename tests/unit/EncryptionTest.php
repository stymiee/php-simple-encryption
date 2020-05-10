<?php

use JohnConde\Encryption\Cipher\AES\Aes256cbc;
use JohnConde\Encryption\Cipher\DES\Descbc;
use JohnConde\Encryption\Encryption;
use JohnConde\Encryption\Exception\CipherNotImplementedException;
use JohnConde\Encryption\Exception\InvalidCipherException;
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
        $encryptionObject = Encryption::getEncryptionObject('AES-128-OCB');
    }

    public function testCreateClassName(): void
    {
        $reflectedEncryptionClass = new ReflectionClass(Encryption::class);
        $createClassName = $reflectedEncryptionClass->getMethod('createClassName');
        $createClassName->setAccessible(true);

        $this->assertEquals(Aes256cbc::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['aes-256-cbc']));
        $this->assertEquals(Descbc::class, $createClassName->invokeArgs($reflectedEncryptionClass, ['des-cbc']));
    }

    public function testListAvailableCiphers(): void
    {
        $availableCiphers = Encryption::listAvailableCiphers();
        $this->assertIsArray($availableCiphers);
        $this->assertContains('aes-128-cbc', $availableCiphers);
        $this->assertContains('sm4-ofb', $availableCiphers);
    }
}
