<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\ARIA;


use JohnConde\Encryption\ACipherAeadMode;
use JohnConde\Encryption\decryptAeadMode;
use JohnConde\Encryption\encryptWithPaddingAeadMode;

class Aria192ccm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ARIA-192-CCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
