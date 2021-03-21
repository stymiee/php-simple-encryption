<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\DecryptException;

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
     * @throws DecryptException
     */
    public function decrypt(string $encryptedText, string $key, string $iv): string
    {
        $string = openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA, $iv);
        if (!$string) {
            $errorMessage = sprintf(
                'Failed to decrypt. [String: %s] [Cipher: %s] [Key: %s] [IV: %s]',
                $encryptedText,
                static::CIPHER,
                $key,
                $iv
            );
            throw new DecryptException($errorMessage);
        }
        return rtrim($string, "\0");
    }
}
