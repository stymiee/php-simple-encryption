<?php

declare(strict_types=1);

namespace Encryption\Cipher\DESX;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Desxcbc
 * @package Encryption\Cipher\DESX
 */
final class Desxcbc extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'DESX-CBC';
}
