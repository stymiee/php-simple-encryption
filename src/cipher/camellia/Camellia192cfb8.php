<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\CAMELLIA;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Camellia192cfb8 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CAMELLIA-192-CFB8';

    use encryptWithPadding, decrypt;
}
