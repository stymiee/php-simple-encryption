<?php

declare(strict_types=1);

namespace JohnConde\Encryption;


interface IEncryptAeadMode
{
    public function encrypt(string $plainText, string $key, string $iv, string &$tag): string;
    public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string;
}
