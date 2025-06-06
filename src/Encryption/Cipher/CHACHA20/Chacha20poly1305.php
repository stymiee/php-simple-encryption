<?php

declare(strict_types=1);

namespace Encryption\Cipher\CHACHA20;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\EncryptAeadMode;
use Encryption\Traits\DecryptAeadMode;

/**
 * Class Chacha20poly1305
 * @package Encryption\Cipher\CHACHA20
 */
final class Chacha20poly1305 extends ACipherAeadMode
{
    use EncryptAeadMode;
    use DecryptAeadMode;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'CHACHA20-POLY1305';
    public const TAG_LENGTH = 16;
}
