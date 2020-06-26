<?php

declare(strict_types=1);

namespace Encryption\Cipher\SM4;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

final class Sm4ofb extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SM4-OFB';
}
