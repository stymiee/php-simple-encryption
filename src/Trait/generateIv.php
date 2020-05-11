<?php

declare(strict_types=1);

namespace Encryption;


trait generateIv
{
    protected function generateInsecureIv(int $length): string
    {
        $permitted_chars = implode(
            '',
            array_merge( // @codeCoverageIgnore
                range('A', 'z'),
                range(0, 9),
                str_split('~!@#$%&*()-=+{};:"<>,.?/\'')
            )
        );
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= $permitted_chars[mt_rand(0, ($length) - 1)];
        }
        return $random;
    }

    public function generateIv(bool $allowLessSecureIv = false): string
    {
        $success = false;
        $random = openssl_random_pseudo_bytes(openssl_cipher_iv_length(static::CIPHER), $success);
        if (!$success) {
            try {
                $random = random_bytes(static::IV_LENGTH);
            } catch (Exception $e) {
                if ($allowLessSecureIv) {
                    $random = $this->generateInsecureIv(static::IV_LENGTH);
                } else {
                    throw new RuntimeException('Unable to generate initialization vector (IV)');
                }
            }
        }
        return $random;
    }
}
