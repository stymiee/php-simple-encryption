<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\RC2;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Rc2cbc extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'RC2-CBC';

    use encryptWithPadding, decrypt;
}
