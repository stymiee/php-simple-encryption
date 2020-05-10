<?php

declare(strict_types=1);

namespace JohnConde\Encryption;

use JohnConde\Encryption\Exception\CipherNotImplementedException;
use JohnConde\Encryption\Exception\InvalidCipherException;

class Encryption
{
    public const DEFAULT_CIPHER = 'AES-256-CBC';

    public static function getEncryptionObject(?string $cipher = null): ICipher
    {
        $cipher ??= static::DEFAULT_CIPHER;
        $cipher = strtolower($cipher);
        $availableCiphers = static::getCipherMethods();
        if (!in_array($cipher, $availableCiphers, true)) {
            throw new InvalidCipherException('Invalid cipher selected');
        }

        return static::createEncryptionObject($cipher);
    }

    protected static function createEncryptionObject(string $cipher): ICipher
    {
        $className = static::createClassName($cipher);
        if (!class_exists($className)) {
            $message = sprintf('Cipher [%s] has not been implemented yet', $cipher);
            throw new CipherNotImplementedException($message);
        }

        return new $className();
    }

    protected static function createClassName(string $cipher): string {
        $crypto = strtoupper(explode('-', $cipher)[0]);
        return sprintf('%s\%s\%s',
           'JohnConde\Encryption\Cipher',
           $crypto,
           str_replace('-', '', ucwords($cipher))
        );
    }

    public static function getCipherMethods(): array
    {
        return array_unique(array_map('strtolower', openssl_get_cipher_methods()));
    }

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
}
