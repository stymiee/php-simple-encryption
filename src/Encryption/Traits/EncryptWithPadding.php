<?php

declare(strict_types=1);

namespace Encryption\Traits;

/**
 * Trait EncryptWithPadding
 * @package Encryption\Traits
 */
trait EncryptWithPadding
{
    /**
     * Encrypts a string for ciphers that use an initialization vector.
     *
     * @param string $plainText
     * @param string $key
     * @param string $iv
     * @return string
     */
    public function encrypt(string $plainText, string $key, string $iv): string
    {
        $plainText = $this->getPaddedText($plainText, static::BLOCK_SIZE);
        return base64_encode(openssl_encrypt($plainText, static::CIPHER, $key, OPENSSL_RAW_DATA, $iv));
    }
}
