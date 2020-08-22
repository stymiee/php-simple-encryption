<?php

declare(strict_types=1);

namespace Encryption\Interfaces;

/**
 * Interface IEncryptWithoutInitializationVector
 * @package Encryption\Interfaces
 */
interface IEncryptWithoutInitializationVector
{
    public function encrypt(string $plainText, string $key): string;

    public function decrypt(string $encryptedText, string $key): string;
}
