<?php

declare(strict_types=1);

namespace Encryption\Cipher\SEED;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Seedcbc
 * @package Encryption\Cipher\SEED
 */
final class Seedcbc extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SEED-CBC';
}
