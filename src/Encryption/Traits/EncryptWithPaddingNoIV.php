<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\EncryptException;

/**
 * Trait EncryptWithPaddingNoIV
 * @package Encryption\Traits
 */
trait EncryptWithPaddingNoIV
{
    /**
     * Encrypts a string for ciphers that do not use an initialization vector.
     *
     * @param string $plainText
     * @param string $key
     * @return string
     * @throws EncryptException
     */
    public function encrypt(string $plainText, string $key): string
    {
        $plainText = $this->getPaddedText($plainText, static::BLOCK_SIZE);
        $encryptedText = openssl_encrypt($plainText, static::CIPHER, $key, OPENSSL_RAW_DATA);
        if (!$encryptedText) {
            $errorMessage = sprintf(
                'Failed to encrypt. [String: %s] [Cipher: %s] [Key: %s]',
                $plainText,
                static::CIPHER,
                $key
            );
            throw new EncryptException($errorMessage);
        }
        return base64_encode($encryptedText);
    }
}
