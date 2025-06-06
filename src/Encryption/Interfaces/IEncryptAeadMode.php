<?php

declare(strict_types=1);

namespace Encryption\Interfaces;

/**
 * Interface IEncryptAeadMode
 * @package Encryption\Interfaces
 */
interface IEncryptAeadMode
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
    public function encrypt(string $plainText, string $key, string $iv, string &$tag): string;

    /**
     * Decrypts the encrypted text using AEAD mode
     *
     * @param string $encryptedText The text to decrypt
     * @param string $key The encryption key
     * @param string $iv The initialization vector
     * @param string $tag The authentication tag
     * @return string The decrypted text
     */
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string;
}
