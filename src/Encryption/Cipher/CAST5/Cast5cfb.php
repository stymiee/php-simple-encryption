<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAST5;


use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\decrypt;
use Encryption\Traits\encryptWithPadding;

class Cast5cfb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'CAST5-CFB';

    use encryptWithPadding, decrypt;
}
