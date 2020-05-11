<?php

declare(strict_types=1);

namespace Encryption\Cipher\BF;


use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\decryptNoIV;
use Encryption\Traits\encryptWithPaddingNoIV;

class Bfecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'BF-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
