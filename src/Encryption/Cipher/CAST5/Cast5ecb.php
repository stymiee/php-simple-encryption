<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;


use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\decryptNoIV;
use Encryption\Traits\encryptWithPaddingNoIV;

class Cast5ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAST5-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
