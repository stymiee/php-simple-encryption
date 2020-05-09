<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\ARIA;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Aria256cfb8 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'ARIA-256-CFB8';

    use encryptWithPadding, decrypt;
}
