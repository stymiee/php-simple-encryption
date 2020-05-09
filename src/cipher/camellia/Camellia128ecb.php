<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\CAMELLIA;


use JohnConde\Encryption\ACipherNoInitializationVector;
use JohnConde\Encryption\decryptNoIV;
use JohnConde\Encryption\encryptWithPaddingNoIV;

class Camellia128ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAMELLIA-128-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
