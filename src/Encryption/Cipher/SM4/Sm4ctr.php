<?php

declare(strict_types=1);

namespace Encryption\Cipher\SM4;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Sm4ctr
 * @package Encryption\Cipher\SM4
 */
final class Sm4ctr extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SM4-CTR';
}
