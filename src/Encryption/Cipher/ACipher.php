<?php

declare(strict_types=1);

namespace Encryption\Cipher;

abstract class ACipher
{
    public const BLOCK_SIZE = 0;
    public const IV_LENGTH = 0;
    public const CIPHER = 'abstract';

    public function __debugInfo(): array
    {
        return [
            'blockSize' => static::BLOCK_SIZE,
            'cipher' => static::CIPHER,
            'ivLength' => static::IV_LENGTH,
        ];
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
