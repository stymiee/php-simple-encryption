<?php

declare(strict_types=1);

namespace Encryption\Cipher\DES;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

/**
 * Class Desede3
 * @package Encryption\Cipher\DES
 * @since 1.0.3
 */
final class Desede3 extends ACipherNoInitializationVector
{
    use EncryptWithPaddingNoIV;
    use DecryptNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'DES-EDE3';
}
