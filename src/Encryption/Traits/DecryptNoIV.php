<?php

declare(strict_types=1);

namespace Encryption\Traits;

/**
 * Trait DecryptNoIV
 * @package Encryption\Traits
 */
trait DecryptNoIV
{
    /**
     * Decrypts a string for ciphers that do not use an initialization vector.
     *
     * @param string $encryptedText
     * @param string $key
     * @return string
     */
    public function decrypt(string $encryptedText, string $key): string
    {
        return rtrim(openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA), "\0");
    }
}
