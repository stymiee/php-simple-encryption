<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;


use Encryption\ACipherWithInitializationVector;
use Encryption\decrypt;
use Encryption\encryptWithPadding;

class Aes256cfb1 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'AES-256-CFB1';

    use encryptWithPadding, decrypt;
}
