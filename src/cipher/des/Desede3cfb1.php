<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\DES;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Desede3cfb1 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'DES-EDE3-CFB1';

    use encryptWithPadding, decrypt;
}
