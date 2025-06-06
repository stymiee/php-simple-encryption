<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\DecryptAeadMode;
use Encryption\Traits\EncryptAeadMode;

/**
 * Class Aes256ccm
 * @package Encryption\Cipher\AES
 */
final class Aes256ccm extends ACipherAeadMode
{
    use DecryptAeadMode;
    use EncryptAeadMode;

    public const BLOCK_SIZE = 16;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-256-CCM';
    public const TAG_LENGTH = 16;
}
