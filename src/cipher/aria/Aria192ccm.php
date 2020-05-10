<?php

declare(strict_types=1);

namespace Encryption\Cipher\ARIA;


use Encryption\ACipherAeadMode;
use Encryption\decryptAeadMode;
use Encryption\encryptWithPaddingAeadMode;

class Aria192ccm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ARIA-192-CCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
