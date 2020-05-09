<?php

declare(strict_types=1);

namespace JohnConde\Encryption\Cipher\SM4;


use JohnConde\Encryption\ACipherWithInitializationVector;
use JohnConde\Encryption\decrypt;
use JohnConde\Encryption\encryptWithPadding;

class Sm4ofb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'SM4-OFB';

    use encryptWithPadding, decrypt;
}
