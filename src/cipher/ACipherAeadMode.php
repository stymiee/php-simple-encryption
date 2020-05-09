<?php

declare(strict_types=1);

namespace JohnConde\Encryption;


abstract class ACipherAeadMode extends ACipher implements ICipher, IEncryptAeadMode
{
    use generateIv;

    abstract public function encrypt(string $plainText, string $key, string $iv, string &$tag): string;

    abstract public function decrypt(string $encryptedText, string $key, string $iv, string $tag): string;
}

