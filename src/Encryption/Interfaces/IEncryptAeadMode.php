<?php

declare(strict_types=1);

namespace Encryption\Interfaces;

/**
 * Interface IEncryptAeadMode
 * @package Encryption\Interfaces
 */
interface IEncryptAeadMode
{
    public function encrypt(string $plainText, string $key, string $iv, string &$tag): string;

    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string;
}
