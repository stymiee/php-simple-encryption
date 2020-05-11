<?php

declare(strict_types=1);

namespace Encryption\Cipher\CHACHA20;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Chacha20 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CHACHA20';

    use encryptWithPadding, decrypt;
}
