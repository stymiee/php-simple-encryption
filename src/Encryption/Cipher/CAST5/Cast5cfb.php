<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Cast5cfb
 * @package Encryption\Cipher\CAST5
 */
final class Cast5cfb extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'CAST5-CFB';
}
