<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\CHACHA20;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Chacha20 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CHACHA20';

    use encryptWithPadding, decrypt;
}
