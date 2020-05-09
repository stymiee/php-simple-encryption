<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\AES;


use JohnConde\Encryption\ACipherAeadMode;
use JohnConde\Encryption\decryptAeadMode;
use JohnConde\Encryption\encryptWithPaddingAeadMode;

class Aes256ccm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-256-CCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
