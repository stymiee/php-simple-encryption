<?php

declare(strict_types=1);

namespace Encryption\Cipher\IDEA;


use Encryption\ACipherWithInitializationVector;
use Encryption\decrypt;
use Encryption\encryptWithPadding;

class Ideacfb extends ACipherWithInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 8;
    public const CIPHER = 'IDEA-CFB';

    use encryptWithPadding, decrypt;
}
