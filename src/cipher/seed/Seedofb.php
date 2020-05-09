<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\SEED;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Seedofb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SEED-OFB';

    use encryptWithPadding, decrypt;
}
