<?php

declare(strict_types=1);

namespace Encryption\Cipher\DES;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

final class Desede extends ACipherNoInitializationVector
{
    use EncryptWithPaddingNoIV;
    use DecryptNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'DES-EDE';
}
