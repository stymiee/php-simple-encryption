<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\CHACHA20;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Chacha20poly1305 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'CHACHA20-POLY1305';

    use encryptWithPadding, decrypt;
}
