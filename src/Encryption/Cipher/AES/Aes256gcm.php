<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\DecryptAeadMode;
use Encryption\Traits\EncryptWithPaddingAeadMode;

/**
 * Class Aes256gcm
 * @package Encryption\Cipher\AES
 */
final class Aes256gcm extends ACipherAeadMode
{
    use DecryptAeadMode;
    use EncryptWithPaddingAeadMode;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-256-GCM';
}
