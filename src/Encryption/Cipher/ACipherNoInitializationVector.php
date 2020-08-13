<?php

declare(strict_types=1);

namespace Encryption\Cipher;

use Encryption\Interfaces\ICipher;
use Encryption\Interfaces\IEncryptWithoutInitializationVector;

/**
 * Class ACipherNoInitializationVector
 * @package Encryption\Cipher
 */
abstract class ACipherNoInitializationVector extends ACipher implements ICipher, IEncryptWithoutInitializationVector
{
    abstract public function encrypt(string $plainText, string $key): string;

    abstract public function decrypt(string $encryptedText, string $key): string;
}
