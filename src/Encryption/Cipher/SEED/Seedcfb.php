<?php

declare(strict_types=1);

namespace Encryption\Cipher\SEED;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Seedcfb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SEED-CFB';

    use encryptWithPadding, decrypt;
}
