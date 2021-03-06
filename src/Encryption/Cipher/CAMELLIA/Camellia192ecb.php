<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAMELLIA;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

/**
 * Class Camellia192ecb
 * @package Encryption\Cipher\CAMELLIA
 */
final class Camellia192ecb extends ACipherNoInitializationVector
{
    use DecryptNoIV;
    use EncryptWithPaddingNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAMELLIA-192-ECB';
}
