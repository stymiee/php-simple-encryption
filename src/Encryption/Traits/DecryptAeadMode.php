<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\DecryptException;

/**
 * Trait DecryptAeadMode
 * @package Encryption\Traits
 */
trait DecryptAeadMode
{
    /**
     * Decrypts a string for ciphers that use a tag generated during the generation of the encrypted string.
     *
     * @param string $encryptedText Base64 encoded encrypted text
     * @param string $key The encryption key
     * @param string $iv The initialization vector
     * @param string $tag The authentication tag
     * @return string The decrypted text
     * @throws DecryptException
     */
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string
    {
        if ($encryptedText === '') {
            throw new DecryptException('Encrypted text cannot be empty');
        }

        $decoded = base64_decode($encryptedText, true);
        if ($decoded === false) {
            throw new DecryptException('Failed to base64 decode the encrypted text');
        }

        $decrypted = openssl_decrypt(
            $decoded,
            static::CIPHER,
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );

        if ($decrypted === false) {
            $error = openssl_error_string();
            throw new DecryptException(
                sprintf(
                    'Decryption failed: %s [Cipher: %s] [Key: %s] [IV: %s] [Tag: %s]',
                    $error,
                    static::CIPHER,
                    $key,
                    bin2hex($iv),
                    bin2hex($tag)
                )
            );
        }

        return rtrim($decrypted, "\0");
    }
}
