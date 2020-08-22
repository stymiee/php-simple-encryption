<?php

declare(strict_types=1);

namespace Encryption\Interfaces;

/**
 * Interface IGenerateInitializationVector
 * @package Encryption\Interfaces
 */
interface IGenerateInitializationVector
{
    public function generateInsecureIv(int $length): string;

    public function generateIv(bool $allowLessSecureIv = false): string;
}
