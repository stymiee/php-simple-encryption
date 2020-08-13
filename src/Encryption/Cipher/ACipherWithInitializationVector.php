<?php

declare(strict_types=1);

namespace Encryption\Cipher;

use Encryption\Interfaces\ICipher;
use Encryption\Interfaces\IEncryptWithInitializationVector;
use Encryption\Traits\GenerateIv;

/**
 * Class ACipherWithInitializationVector
 * @package Encryption\Cipher
 */
abstract class ACipherWithInitializationVector extends ACipher implements ICipher, IEncryptWithInitializationVector
{
    use GenerateIv;

    abstract public function encrypt(string $plainText, string $key, string $iv): string;

    abstract public function decrypt(string $encryptedText, string $key, string $iv): string;
}
