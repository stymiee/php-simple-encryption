<?php

declare(strict_types=1);

namespace Encryption\Cipher\AES;


use Encryption\ACipherAeadMode;
use Encryption\decryptAeadMode;
use Encryption\encryptWithPaddingAeadMode;

class Aes128gcm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'AES-128-GCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
