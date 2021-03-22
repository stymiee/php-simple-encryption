<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\EncryptException;

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
     * @throws EncryptException
     */
    public function encrypt(string $plainText, string $key, string $iv): string
    {
        $plainText = $this->getPaddedText($plainText, static::BLOCK_SIZE);
        $encryptedText = openssl_encrypt($plainText, static::CIPHER, $key, OPENSSL_RAW_DATA, $iv);
        if (!$encryptedText) {
            $errorMessage = sprintf(
                'Failed to encrypt. [String: %s] [Cipher: %s] [Key: %s] [IV: %s]',
                $plainText,
                static::CIPHER,
                $key,
                $iv
            );
            throw new EncryptException($errorMessage);
        }
        return base64_encode($encryptedText);
    }
}
