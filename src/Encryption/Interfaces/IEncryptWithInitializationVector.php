<?php

declare(strict_types=1);

namespace Encryption\Interfaces;

/**
 * Interface IEncryptWithInitializationVector
 * @package Encryption\Interfaces
 */
interface IEncryptWithInitializationVector
{
    public function encrypt(string $plainText, string $key, string $iv): string;

    public function decrypt(string $encryptedText, string $key, string $iv): string;
}
