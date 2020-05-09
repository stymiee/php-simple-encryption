<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\CAST5;


use JohnConde\Encryption\ACipherNoInitializationVector;
use JohnConde\Encryption\decryptNoIV;
use JohnConde\Encryption\encryptWithPaddingNoIV;

class Cast5ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAST5-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
