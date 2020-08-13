<?php

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

    public const VERSION = 1;

    /**
     * Builds and returns an encryption object with the specified cipher. Defaults to the default cipher which will
     * change with each version of this library.
     *
     * @param string|null $cipher
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
