<?php

declare(strict_types=1);

namespace Encryption\Cipher\RC2;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Rc2ofb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'RC2-OFB';

    use encryptWithPadding, decrypt;
}
