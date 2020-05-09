<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\BF;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Bfcbc extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'BF-CBC';

    use encryptWithPadding, decrypt;
}
