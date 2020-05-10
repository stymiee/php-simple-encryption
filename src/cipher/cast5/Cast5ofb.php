<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;


use Encryption\ACipherWithInitializationVector;
use Encryption\decrypt;
use Encryption\encryptWithPadding;

class Cast5ofb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'CAST5-OFB';

    use encryptWithPadding, decrypt;
}
