<?php

declare(strict_types=1);

namespace Encryption;


trait decryptNoIV
{
    public function decrypt(string $encryptedText, string $key): string
    {
        return rtrim(openssl_decrypt(base64_decode($encryptedText), static::CIPHER, $key, OPENSSL_RAW_DATA), "\0");
    }
}
