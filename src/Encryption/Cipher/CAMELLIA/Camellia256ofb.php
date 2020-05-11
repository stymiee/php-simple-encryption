<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAMELLIA;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Camellia256ofb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CAMELLIA-256-OFB';

    use encryptWithPadding, decrypt;
}
