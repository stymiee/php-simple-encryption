<?php

declare(strict_types=1);

namespace Encryption\Traits;

/**
 * Trait EncryptWithPaddingNoIV
 * @package Encryption\Traits
 */
trait EncryptWithPaddingNoIV
{
    public function encrypt(string $plainText, string $key): string
    {
        $plainText = $this->getPaddedText($plainText, static::BLOCK_SIZE);
        return base64_encode(openssl_encrypt($plainText, static::CIPHER, $key, OPENSSL_RAW_DATA));
    }
}
