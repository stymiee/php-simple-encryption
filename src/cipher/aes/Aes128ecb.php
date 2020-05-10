<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;


use Encryption\ACipherNoInitializationVector;
use Encryption\decryptNoIV;
use Encryption\encryptWithPaddingNoIV;

class Aes128ecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'AES-128-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
