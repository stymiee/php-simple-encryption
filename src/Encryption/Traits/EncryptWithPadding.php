<?php

declare(strict_types=1);

namespace Encryption\Traits;

trait EncryptWithPadding
{
    public function encrypt(string $plainText, string $key, string $iv): string
    {
        $plainText = $this->getPaddedText($plainText, static::BLOCK_SIZE);
        return base64_encode(openssl_encrypt($plainText, static::CIPHER, $key, OPENSSL_RAW_DATA, $iv));
    }
}
