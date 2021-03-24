<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\DecryptAeadMode;
use Encryption\Traits\EncryptWithPaddingAeadMode;

/**
 * Class Aes192ocb
 * @package Encryption\Cipher\AES
 */
final class Aes192ocb extends ACipherAeadMode
{
    use EncryptWithPaddingAeadMode;
    use DecryptAeadMode;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-192-OCB';
}
