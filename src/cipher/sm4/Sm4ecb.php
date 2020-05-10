<?php

declare(strict_types=1);

namespace Encryption\Cipher\SM4;


use Encryption\ACipherNoInitializationVector;
use Encryption\decryptNoIV;
use Encryption\encryptWithPaddingNoIV;

class Sm4ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'SM4-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
