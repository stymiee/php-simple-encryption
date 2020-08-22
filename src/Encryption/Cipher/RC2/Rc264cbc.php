<?php

declare(strict_types=1);

namespace Encryption\Cipher\RC2;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Rc264cbc
 * @package Encryption\Cipher\RC2
 */
final class Rc264cbc extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'RC2-64-CBC';
}
