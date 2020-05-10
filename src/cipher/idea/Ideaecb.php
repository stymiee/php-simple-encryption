<?php

declare(strict_types=1);

namespace Encryption\Cipher\IDEA;


use Encryption\ACipherNoInitializationVector;
use Encryption\decryptNoIV;
use Encryption\encryptWithPaddingNoIV;

class Ideaecb extends ACipherNoInitializationVector
{
    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'IDEA-ECB';

    use encryptWithPaddingNoIV, decryptNoIV;
}
