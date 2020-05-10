<?php

declare(strict_types=1);

namespace Encryption\Cipher\DES;


use Encryption\ACipherWithInitializationVector;
use Encryption\decrypt;
use Encryption\encryptWithPadding;

class Descfb1 extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'DES-CFB1';

    use encryptWithPadding, decrypt;
}
