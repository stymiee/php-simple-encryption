<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;


use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\decryptAeadMode;
use Encryption\Traits\encryptWithPaddingAeadMode;

class Aes192gcm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-192-GCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
