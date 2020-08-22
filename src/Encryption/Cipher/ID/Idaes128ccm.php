<?php

declare(strict_types=1);

namespace Encryption\Cipher\ID;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\DecryptAeadMode;
use Encryption\Traits\EncryptWithPaddingAeadMode;

/**
 * Class Idaes128ccm
 * @package Encryption\Cipher\ID
 */
final class Idaes128ccm extends ACipherAeadMode
{
    use DecryptAeadMode;
    use EncryptWithPaddingAeadMode;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ID-AES128-CCM';
}
