<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\ARIA;


use JohnConde\Encryption\ACipherNoInitializationVector;
use JohnConde\Encryption\decryptNoIV;
use JohnConde\Encryption\encryptWithPaddingNoIV;

class Aria192ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'ARIA-192-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
