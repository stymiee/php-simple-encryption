<?php

declare(strict_types=1);

namespace Encryption\Cipher\CHACHA20;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Chacha20
 * @package Encryption\Cipher\CHACHA20
 */
final class Chacha20 extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CHACHA20';
}
