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
     * @param string $encryptedText
     * @param string $key
     * @param string $iv
     * @param string $tag
     * @return string
     * @throws DecryptException
     */
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string
    {
        $string = openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag);
        if (!$string) {
            $errorMessage = sprintf(
                'Failed to decrypt. [String: %s] [Cipher: %s] [Key: %s] [IV: %s] [Tag:%s]',
                $encryptedText,
                static::CIPHER,
                $key,
                $iv,
                $tag
            );
            throw new DecryptException($errorMessage);
        }
        return rtrim($string, "\0");
    }
}
