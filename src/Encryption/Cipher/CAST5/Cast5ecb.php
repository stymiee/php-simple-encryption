<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

/**
 * Class Cast5ecb
 * @package Encryption\Cipher\CAST5
 */
final class Cast5ecb extends ACipherNoInitializationVector
{
    use DecryptNoIV;
    use EncryptWithPaddingNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'CAST5-ECB';
}
