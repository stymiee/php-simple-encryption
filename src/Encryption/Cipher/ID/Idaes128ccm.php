<?php

declare(strict_types=1);

namespace Encryption\Cipher\ID;


use Encryption\Cipher\ACipherAeadMode;
use Encryption\Traits\decryptAeadMode;
use Encryption\Traits\encryptWithPaddingAeadMode;

class Idaes128ccm extends ACipherAeadMode
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'ID-AES128-CCM';

    use encryptWithPaddingAeadMode, decryptAeadMode;
}
