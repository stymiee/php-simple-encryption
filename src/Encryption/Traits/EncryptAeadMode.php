<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Interfaces\IEncryptAeadMode;

/**
 * Trait EncryptAeadMode
 * @package Encryption\Traits
 */
trait EncryptAeadMode
{
    /**
     * Encrypts the plaintext using AEAD mode
     *
     * @param string $plainText The text to encrypt
     * @param string $key The encryption key
     * @param string $iv The initialization vector
     * @param string &$tag Reference to store the authentication tag
     * @return string The encrypted text
     */
    public function encrypt(string $plainText, string $key, string $iv, string &$tag): string
    {
        $encrypted = openssl_encrypt(
            $plainText,
            static::CIPHER,
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag,
            '',
            static::TAG_LENGTH
        );

        if ($encrypted === false) {
            throw new \RuntimeException('Encryption failed: ' . openssl_error_string());
        }

        return base64_encode($encrypted);
    }
} 