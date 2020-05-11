<?php

declare(strict_types=1);

namespace Encryption\Cipher\SM4;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Sm4ctr extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SM4-CTR';

    use encryptWithPadding, decrypt;
}
