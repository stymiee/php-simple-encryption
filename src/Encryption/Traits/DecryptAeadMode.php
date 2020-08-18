<?php

declare(strict_types=1);

namespace Encryption\Traits;

/**
 * Trait DecryptAeadMode
 * @package Encryption\Traits
 */
trait DecryptAeadMode
{
    /**
     * Decrypts a string for ciphers that use a tag generated during the generation of the encrypted string.
     *
     * @param string $encryptedText
     * @param string $key
     * @param string $iv
     * @param string $tag
     * @return string
     */
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string
    {
        return rtrim(openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag), "\0");
    }
}
