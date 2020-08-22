<?php

declare(strict_types=1);

namespace Encryption\Cipher\IDEA;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Ideaofb
 * @package Encryption\Cipher\IDEA
 */
final class Ideaofb extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'IDEA-OFB';
}
