<?php

declare(strict_types=1);

namespace Encryption\Traits;

trait DecryptAeadMode
{
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string
    {
        return rtrim(openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag));
    }
}
