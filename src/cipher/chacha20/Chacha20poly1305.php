<?php

declare(strict_types=1);

namespace Encryption\Cipher\CHACHA20;


use Encryption\ACipherWithInitializationVector;
use Encryption\decrypt;
use Encryption\encryptWithPadding;

class Chacha20poly1305 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 12;
    public const CIPHER = 'CHACHA20-POLY1305';

    use encryptWithPadding, decrypt;
}
