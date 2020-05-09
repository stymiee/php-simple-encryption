<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\BF;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Bfcfb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'BF-CFB';

    use encryptWithPadding, decrypt;
}
