<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\AES;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Aes128cfb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'AES-128-CFB';

    use encryptWithPadding, decrypt;
}
