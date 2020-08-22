<?php

declare(strict_types=1);

namespace Encryption\Cipher\SM4;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

/**
 * Class Sm4ecb
 * @package Encryption\Cipher\SM4
 */
final class Sm4ecb extends ACipherNoInitializationVector
{
    use DecryptNoIV;
    use EncryptWithPaddingNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'SM4-ECB';
}
