<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\SEED;


use JohnConde\Encryption\ACipherNoInitializationVector;
use JohnConde\Encryption\decryptNoIV;
use JohnConde\Encryption\encryptWithPaddingNoIV;

class Seedecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'SEED-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
