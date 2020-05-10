<?php

declare(strict_types=1);

namespace Encryption;


interface ICipher
{
    public function getName(): string;
}
