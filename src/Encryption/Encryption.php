<?php
/**
 * The PHP Simple Encryption library is designed to simplify the process of encrypting and decrypting data while
 * ensuring best practices are followed. By default, it uses a secure encryption algorithm and generates a
 * cryptologically strong initialization vector so developers do not need to become experts in encryption to securely
 * store sensitive data.
 *
 * @author John Conde <stymiee@gmail.com>
 * @example https://www.johnconde.net/blog/php-simple-encryption/ PHP Simple Encryption
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @link https://github.com/stymiee/php-simple-encryption
 * @version 1.0.4
 */

declare(strict_types=1);

namespace Encryption;

use Encryption\Cipher\ACipher;
use Encryption\Exceptions\CipherNotImplementedException;
use Encryption\Exceptions\InvalidCipherException;
use Encryption\Exceptions\InvalidVersionException;

/**
 * Class Encryption
 * @package Encryption
 */
class Encryption
{
    public const DEFAULT_CIPHER = 'AES-256-CBC';

    /**
     * @since 1.0.2
     */
    public const VERSION = 1;

    /**
     * Builds and returns an encryption object with the specified cipher. Defaults to the default cipher which will
     * change with each version of this library.
     *
     * @param string|null $cipher
     * @uses \Encryption\Encryption::getCipherMethods()
     * @uses \Encryption\Encryption::createEncryptionObject()
     * @return ACipher
     * @throws CipherNotImplementedException
     * @throws InvalidCipherException
     */
    public static function getEncryptionObject(?string $cipher = null): ACipher
    {
        $cipher = strtolower($cipher ?: static::DEFAULT_CIPHER);
        $availableCiphers = static::getCipherMethods();
        if (!in_array($cipher, $availableCiphers, true)) {
            $message = sprintf('Invalid cipher selected [%s]', $cipher);
            throw new InvalidCipherException($message);
        }
        return static::createEncryptionObject($cipher);
    }

    /**
     * Returns a unique list of ciphers on the system in lowercase.
     *
     * @return array
     */
    public static function getCipherMethods(): array
    {
        return array_unique(array_map('strtolower', openssl_get_cipher_methods()));
    }

    /**
     * Builds the class name for the specified cipher.
     *
     * @param string $cipher
     * @return string
     */
    protected static function createClassName(string $cipher): string
    {
        $crypto = strtoupper(explode('-', $cipher)[0]);
        return sprintf(
            '%s\%s\%s',
            'Encryption\Cipher',
            $crypto,
            str_replace('-', '', ucwords($cipher))
        );
    }

    /**
     * Creates the encryption object using the specified cipher.
     *
     * @param string $cipher
     * @uses \Encryption\Encryption::createClassName()
     * @return ACipher
     * @throws CipherNotImplementedException
     */
    protected static function createEncryptionObject(string $cipher): ACipher
    {
        $className = static::createClassName($cipher);
        if (!class_exists($className)) {
            $message = sprintf('Cipher [%s] has not been implemented yet', $cipher);
            throw new CipherNotImplementedException($message);
        }
        return new $className();
    }

    /**
     * Returns all ciphers that are available on the system AND is supported by this library.
     *
     * @uses \Encryption\Encryption::getCipherMethods()
     * @uses \Encryption\Encryption::createClassName()
     * @return array
     */
    public static function listAvailableCiphers(): array
    {
        $availableCiphers = [];
        foreach (static::getCipherMethods() as $cipher) {
            $className = static::createClassName($cipher);
            if (class_exists($className)) {
                $availableCiphers[] = $cipher;
            }
        }
        return $availableCiphers;
    }

    /**
     * Returns the default cipher for a specified version. Defaults to the current version if no version is specified.
     *
     * @param int $version
     * @return string
     * @throws InvalidVersionException
     */
    public static function getDefaultCipherByVersion(int $version = self::VERSION): string
    {
        $defaultCiphers = [
            self::VERSION => self::DEFAULT_CIPHER,
        ];
        if (isset($defaultCiphers[$version])) {
            return $defaultCiphers[$version];
        }

        throw new InvalidVersionException(sprintf('Invalid version: [%s]', $version));
    }
}
