<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\DecryptException;

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
     * @throws DecryptException
     */
    public function decrypt(string $encryptedText, string $key): string
    {
        $string = openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA);
        if (!$string) {
            $errorMessage = sprintf(
                'Failed to decrypt. [String: %s] [Cipher: %s] [Key: %s]',
                $encryptedText,
                static::CIPHER,
                $key
            );
            throw new DecryptException($errorMessage);
        }
        return rtrim($string, "\0");
    }
}
