<?php

declare(strict_types=1);

namespace Encryption\Cipher\RC2;


use Encryption\ACipherNoInitializationVector;
use Encryption\decryptNoIV;
use Encryption\encryptWithPaddingNoIV;

class Rc2ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'RC2-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
