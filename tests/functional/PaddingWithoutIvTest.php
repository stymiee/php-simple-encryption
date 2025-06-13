<?php

namespace functional;

use Encryption\Cipher\AES\Aes128ecb;
use Encryption\Cipher\AES\Aes192ecb;
use Encryption\Cipher\AES\Aes256ecb;
use Encryption\Cipher\ARIA\Aria128ecb;
use Encryption\Cipher\ARIA\Aria192ecb;
use Encryption\Cipher\ARIA\Aria256ecb;
use Encryption\Cipher\CAMELLIA\Camellia128ecb;
use Encryption\Cipher\CAMELLIA\Camellia192ecb;
use Encryption\Cipher\CAMELLIA\Camellia256ecb;
use Encryption\Cipher\DES\Desede;
use Encryption\Cipher\DES\Desede3;
use Encryption\Cipher\SM4\Sm4ecb;
use PHPUnit\Framework\TestCase;

class PaddingWithoutIvTest extends TestCase
{
    private string $key;
    private string $plainText;

    public function setUp(): void
    {
        $this->key = 'secretkey';
        $this->plainText = 'The quick brown fox jumps over the lazy dog';
    }

    /**
     * @dataProvider dataProvider
     * @param $cipher
     * @param $encrypted
     */
    public function testCiphersWithPaddingAndNoIv($cipher, $encrypted): void
    {
        $encryptionObject = new $cipher();
        $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key);
        $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key);
        self::assertEquals($encrypted, $encryptedText);
        self::assertEquals($this->plainText, $decrytpedText);
    }

    public static function dataProvider(): array
    {
        return [
            [
                'cipher' => Aes128ecb::class,
                'encrypted' => '1sWmbK4ibtOm8y06byMF54drhnmkmIfsl/dJW2hF5QGV+zaIX4EjOODIF45nT++bhzPEC47m+g/AVvyd1bCCww=='
            ],
            [
                'cipher' => Aes192ecb::class,
                'encrypted' => 'A25nlFnWmCJ+7JfRH7W3i4rwqZYxuh/WHYVLaekMSxoO68USg9MorBpHZsLZjxQwS3so/FJ2a6u/Gg/oNErNCw=='
            ],
            [
                'cipher' => Aes256ecb::class,
                'encrypted' => 'at2CVI/8WlTnIBf3pCQo+C8u255HOZy96oDl5QaBRZdlxrONJu7qzZaL/JmzeERCK4WgRGopzze4YpWDW1jJbA=='
            ],
            [
                'cipher' => Aria128ecb::class,
                'encrypted' => 'zIbAxcBok2mHiRgII2wBGqwlBuBGjM1v7txqT7x9556oIe29AYELuAItpMVnraPcGDzBzuRAWabZgx3HxePFNw=='
            ],
            [
                'cipher' => Aria192ecb::class,
                'encrypted' => 'jwYBFy2M+MLoxvO4vqM+YNRcpE3DG8RX4dCGjxWs4Uu5MSuHIzNTEM4lFZtdJbvUK2zF84AtdYZ19xfU0qEK6A=='
            ],
            [
                'cipher' => Aria256ecb::class,
                'encrypted' => 'kW2yCvqaQifJ+DnxhKN/2cHoGhBE7YzN+ezWMIl+aaoiuZjZpm5plf/iqIwB5IytCve6ZkryBT91GfzBIKMOGg=='
            ],
            [
                'cipher' => Camellia128ecb::class,
                'encrypted' => 'qb/Erl+Etmjggjj3By4iglx+fy/H2M9Npnfn8OL3Y4j89JaZqcZjnFakaOiVISLFCdxG/hF16HNdXOrLbz0W8g=='
            ],
            [
                'cipher' => Camellia192ecb::class,
                'encrypted' => '7YZW/ILobjYUtbrHTY08zqR/l49KK08jEsiaRDzQHY6oVAkNy9vl/Nma6f9iyEFP9g3OOW3ElEGNRQnSG/r2cg=='
            ],
            [
                'cipher' => Camellia256ecb::class,
                'encrypted' => '4x3qqb+Q8+EivbWDrDvz4ospB+7b7KsYN3TrJ3VBPSjtx3Wrc1YERcwI9GF+Zzpm3DlFarzF2MjkJEWv/c7dLA=='
            ],
            [
                'cipher' => Desede::class,
                'encrypted' => 'ORdyjY2C/bVRCCDfzGCvK36NVYzhJSzpv6oVJzeK5hL7378Odi3aDiza3X7hKKkG5HVmNal7wqM='
            ],
            [
                'cipher' => Desede3::class,
                'encrypted' => 'WQ5+KcAAXzLeTZQ5xpj3F8kMTTtmo25P1VuYq2k19z1Wppe5x6BplIE3X8lxdQ89zma4MrHzPNo='
            ],
            [
                'cipher' => Sm4ecb::class,
                'encrypted' => 'JjcdgcTHcEFgdKULv7tB8JX2ncfOSN1Lv2XlVbmOdBGH/kQKUctfzmOTS3DL3bSYFnKKXgoR4dcCPjAF/pjh+A=='
            ],
        ];
    }
}
