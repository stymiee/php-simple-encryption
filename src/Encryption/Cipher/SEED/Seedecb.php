<?php

declare(strict_types=1);

namespace Encryption\Cipher\SEED;


use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\decryptNoIV;
use Encryption\Traits\encryptWithPaddingNoIV;

class Seedecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'SEED-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
