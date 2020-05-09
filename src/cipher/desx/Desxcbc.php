<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\DESX;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Desxcbc extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'DESX-CBC';

    use encryptWithPadding, decrypt;
}
