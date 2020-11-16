<?php

declare(strict_types=1);

namespace Encryption\Cipher;

use Encryption\Exceptions\EncryptionException;

/**
 * Class ACipher
 * @package Encryption\Cipher
 */
abstract class ACipher
{
    public const BLOCK_SIZE = 0;
    public const IV_LENGTH = 0;
    public const CIPHER = 'abstract';

    /**
     * @since 1.0.1
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'blockSize' => static::BLOCK_SIZE,
            'cipher' => static::CIPHER,
            'ivLength' => static::IV_LENGTH,
        ];
    }

    /**
     * @since 1.0.4
     * @param string $name
     * @param array $arguments
     * @throws EncryptionException
     */
    public function __call(string $name, array $arguments): void
    {
        if ($name === 'generateIv') {
            $msg = sprintf(
                '%s does not require an initialization vector (IV). Do not call Encryption::generateIv().',
                static::CIPHER
            );
            throw new EncryptionException($msg);
        }
    }

    /**
     * Fetch the name of the cipher being used.
     *
     * @return string
     */
    public function getName(): string
    {
        return static::CIPHER;
    }

    /**
     * Returns text with null padding appended to meet the specified block size.
     *
     * @param string $plainText
     * @param int $blockSize
     * @return string
     */
    protected function getPaddedText(string $plainText, int $blockSize): string
    {
        $stringLength = strlen($plainText);
        if ($stringLength % $blockSize) {
            $plainText = str_pad($plainText, $stringLength + $blockSize - $stringLength % $blockSize, "\0");
        }
        return $plainText;
    }
}
