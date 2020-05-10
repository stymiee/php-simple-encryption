<?php

declare(strict_types=1);

namespace Encryption;


abstract class ACipher
{
    public const BLOCK_SIZE = 0;
    public const IV_LENGTH = 0;
    public const CIPHER = 'abstract';

    public function getName(): string
    {
        return static::CIPHER;
    }

    protected function getPaddedText(string $plainText, int $blockSize): string
    {
        $stringLength = strlen($plainText);
        if ($stringLength % $blockSize) {
            $plainText = str_pad($plainText, $stringLength + $blockSize - $stringLength % $blockSize, "\0");
        }
        return $plainText;
    }
}
