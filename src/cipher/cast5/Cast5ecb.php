<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;


use Encryption\ACipherNoInitializationVector;
use Encryption\decryptNoIV;
use Encryption\encryptWithPaddingNoIV;

class Cast5ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAST5-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
