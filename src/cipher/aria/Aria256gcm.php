<?php

declare(strict_types=1);

namespace Encryption\Cipher\ARIA;


use Encryption\ACipherAeadMode;
use Encryption\decryptAeadMode;
use Encryption\encryptWithPaddingAeadMode;

class Aria256gcm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ARIA-256-GCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
