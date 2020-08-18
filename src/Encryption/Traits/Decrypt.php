<?php

declare(strict_types=1);

namespace Encryption\Traits;

/**
 * Trait Decrypt
 * @package Encryption\Traits
 */
trait Decrypt
{
    /**
     * Decrypts a string for ciphers that use an initialization vector.
     *
     * @param string $encryptedText
     * @param string $key
     * @param string $iv
     * @return string
     */
    public function decrypt(string $encryptedText, string $key, string $iv): string
    {
        return rtrim(openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA, $iv), "\0");
    }
}
