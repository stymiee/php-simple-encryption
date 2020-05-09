<?php

declare(strict_types=1);

namespace JohnConde\Encryption;


abstract class ACipherWithInitializationVector extends ACipher implements ICipher, IEncryptWithInitializationVector
{
    use generateIv;

    abstract public function encrypt(string $plainText, string $key, string $iv): string;

    abstract public function decrypt(string $encryptedText, string $key, string $iv): string;
}



