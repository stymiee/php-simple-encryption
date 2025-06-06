<?php

declare(strict_types=1);

namespace Encryption\Cipher\ARIA;

use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\DecryptAeadMode;
use Encryption\Traits\EncryptAeadMode;

/**
 * Class Aria256ccm
 * @package Encryption\Cipher\ARIA
 */
final class Aria256ccm extends ACipherAeadMode
{
    use DecryptAeadMode;
    use EncryptAeadMode;

    public const BLOCK_SIZE = 16;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ARIA-256-CCM';
    public const TAG_LENGTH = 16;
}
