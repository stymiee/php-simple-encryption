<?php

namespace functional;

use JohnConde\Encryption\Cipher\AES\Aes128cbc;
use JohnConde\Encryption\Cipher\AES\Aes128cfb;
use JohnConde\Encryption\Cipher\AES\Aes128cfb1;
use JohnConde\Encryption\Cipher\AES\Aes128cfb8;
use JohnConde\Encryption\Cipher\AES\Aes128ctr;
use JohnConde\Encryption\Cipher\AES\Aes128ecb;
use JohnConde\Encryption\Cipher\AES\Aes128ofb;
use JohnConde\Encryption\Cipher\AES\Aes128xts;
use JohnConde\Encryption\Cipher\AES\Aes192cbc;
use JohnConde\Encryption\Cipher\AES\Aes192cfb;
use JohnConde\Encryption\Cipher\AES\Aes192cfb1;
use JohnConde\Encryption\Cipher\AES\Aes192cfb8;
use JohnConde\Encryption\Cipher\AES\Aes192ctr;
use JohnConde\Encryption\Cipher\AES\Aes192ecb;
use JohnConde\Encryption\Cipher\AES\Aes192ofb;
use JohnConde\Encryption\Cipher\AES\Aes256cbc;
use JohnConde\Encryption\Cipher\AES\Aes256cfb;
use JohnConde\Encryption\Cipher\AES\Aes256cfb1;
use JohnConde\Encryption\Cipher\AES\Aes256cfb8;
use JohnConde\Encryption\Cipher\AES\Aes256ctr;
use JohnConde\Encryption\Cipher\AES\Aes256ecb;
use JohnConde\Encryption\Cipher\AES\Aes256ofb;
use JohnConde\Encryption\Cipher\AES\Aes256xts;
use JohnConde\Encryption\Cipher\ARIA\Aria128cbc;
use JohnConde\Encryption\Cipher\ARIA\Aria128cfb;
use JohnConde\Encryption\Cipher\ARIA\Aria128cfb1;
use JohnConde\Encryption\Cipher\ARIA\Aria128cfb8;
use JohnConde\Encryption\Cipher\ARIA\Aria128ctr;
use JohnConde\Encryption\Cipher\ARIA\Aria128ecb;
use JohnConde\Encryption\Cipher\ARIA\Aria128ofb;
use JohnConde\Encryption\Cipher\ARIA\Aria192cbc;
use JohnConde\Encryption\Cipher\ARIA\Aria192cfb;
use JohnConde\Encryption\Cipher\ARIA\Aria192cfb1;
use JohnConde\Encryption\Cipher\ARIA\Aria192cfb8;
use JohnConde\Encryption\Cipher\ARIA\Aria192ctr;
use JohnConde\Encryption\Cipher\ARIA\Aria192ecb;
use JohnConde\Encryption\Cipher\ARIA\Aria192ofb;
use JohnConde\Encryption\Cipher\ARIA\Aria256cbc;
use JohnConde\Encryption\Cipher\ARIA\Aria256cfb;
use JohnConde\Encryption\Cipher\ARIA\Aria256cfb1;
use JohnConde\Encryption\Cipher\ARIA\Aria256cfb8;
use JohnConde\Encryption\Cipher\ARIA\Aria256ctr;
use JohnConde\Encryption\Cipher\ARIA\Aria256ecb;
use JohnConde\Encryption\Cipher\ARIA\Aria256ofb;
use JohnConde\Encryption\Cipher\BF\Bfcbc;
use JohnConde\Encryption\Cipher\BF\Bfcfb;
use JohnConde\Encryption\Cipher\BF\Bfecb;
use JohnConde\Encryption\Cipher\BF\Bfofb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128cbc;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128cfb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128cfb1;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128cfb8;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128ctr;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128ecb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia128ofb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192cbc;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192cfb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192cfb1;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192cfb8;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192ctr;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192ecb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia192ofb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256cbc;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256cfb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256cfb1;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256cfb8;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256ctr;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256ecb;
use JohnConde\Encryption\Cipher\CAMELLIA\Camellia256ofb;
use JohnConde\Encryption\Cipher\CAST5\Cast5cbc;
use JohnConde\Encryption\Cipher\CAST5\Cast5cfb;
use JohnConde\Encryption\Cipher\CAST5\Cast5ecb;
use JohnConde\Encryption\Cipher\CAST5\Cast5ofb;
use JohnConde\Encryption\Cipher\CHACHA20\Chacha20;
use JohnConde\Encryption\Cipher\CHACHA20\Chacha20poly1305;
use JohnConde\Encryption\Cipher\DES\Descbc;
use JohnConde\Encryption\Cipher\DES\Descfb;
use JohnConde\Encryption\Cipher\DES\Descfb1;
use JohnConde\Encryption\Cipher\DES\Descfb8;
use JohnConde\Encryption\Cipher\DES\Desecb;
use JohnConde\Encryption\Cipher\DES\Desede3cbc;
use JohnConde\Encryption\Cipher\DES\Desede3cfb;
use JohnConde\Encryption\Cipher\DES\Desede3cfb1;
use JohnConde\Encryption\Cipher\DES\Desede3cfb8;
use JohnConde\Encryption\Cipher\DES\Desede3ofb;
use JohnConde\Encryption\Cipher\DES\Desedecbc;
use JohnConde\Encryption\Cipher\DES\Desedecfb;
use JohnConde\Encryption\Cipher\DES\Desedeofb;
use JohnConde\Encryption\Cipher\DES\Desofb;
use JohnConde\Encryption\Cipher\DESX\Desxcbc;
use JohnConde\Encryption\Cipher\IDEA\Ideacbc;
use JohnConde\Encryption\Cipher\IDEA\Ideacfb;
use JohnConde\Encryption\Cipher\IDEA\Ideaecb;
use JohnConde\Encryption\Cipher\IDEA\Ideaofb;
use JohnConde\Encryption\Cipher\RC2\Rc240cbc;
use JohnConde\Encryption\Cipher\RC2\Rc264cbc;
use JohnConde\Encryption\Cipher\RC2\Rc2cbc;
use JohnConde\Encryption\Cipher\RC2\Rc2cfb;
use JohnConde\Encryption\Cipher\RC2\Rc2ecb;
use JohnConde\Encryption\Cipher\RC2\Rc2ofb;
use JohnConde\Encryption\Cipher\SEED\Seedcbc;
use JohnConde\Encryption\Cipher\SEED\Seedcfb;
use JohnConde\Encryption\Cipher\SEED\Seedecb;
use JohnConde\Encryption\Cipher\SEED\Seedofb;
use JohnConde\Encryption\Cipher\SM4\Sm4cbc;
use JohnConde\Encryption\Cipher\SM4\Sm4cfb;
use JohnConde\Encryption\Cipher\SM4\Sm4ctr;
use JohnConde\Encryption\Cipher\SM4\Sm4ecb;
use JohnConde\Encryption\Cipher\SM4\Sm4ofb;
use PHPUnit\Framework\TestCase;

class PaddingWithoutIvTest extends TestCase
{
    private $key;
    private $plainText;

    public function setUp(): void
    {
        $this->key = 'secretkey';
        $this->plainText = 'The quick brown fox jumps over the lazy dog';
    }

    /**
     * @dataProvider dataProvider
     */
    public function testCiphersWithPaddingAndNoIv($cipher, $encrypted): void
    {
        $encryptionObject = new $cipher();
        $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key);
        $decrytpedText = trim($encryptionObject->decrypt($encryptedText, $this->key));
        $this->assertEquals($encrypted, $encryptedText);
        $this->assertEquals($this->plainText, $decrytpedText);
    }

    public function dataProvider(): array
    {
        return [
            [
                'class' => Aes128ecb::class,
                'encryptedText' => '1sWmbK4ibtOm8y06byMF54drhnmkmIfsl/dJW2hF5QGV+zaIX4EjOODIF45nT++bhzPEC47m+g/AVvyd1bCCww=='
            ],
            [
                'class' => Aes192ecb::class,
                'encryptedText' => 'A25nlFnWmCJ+7JfRH7W3i4rwqZYxuh/WHYVLaekMSxoO68USg9MorBpHZsLZjxQwS3so/FJ2a6u/Gg/oNErNCw=='
            ],
            [
                'class' => Aes256ecb::class,
                'encryptedText' => 'at2CVI/8WlTnIBf3pCQo+C8u255HOZy96oDl5QaBRZdlxrONJu7qzZaL/JmzeERCK4WgRGopzze4YpWDW1jJbA=='
            ],
            [
                'class' => Aria128ecb::class,
                'encryptedText' => 'zIbAxcBok2mHiRgII2wBGqwlBuBGjM1v7txqT7x9556oIe29AYELuAItpMVnraPcGDzBzuRAWabZgx3HxePFNw=='
            ],
            [
                'class' => Aria192ecb::class,
                'encryptedText' => 'jwYBFy2M+MLoxvO4vqM+YNRcpE3DG8RX4dCGjxWs4Uu5MSuHIzNTEM4lFZtdJbvUK2zF84AtdYZ19xfU0qEK6A=='
            ],
            [
                'class' => Aria256ecb::class,
                'encryptedText' => 'kW2yCvqaQifJ+DnxhKN/2cHoGhBE7YzN+ezWMIl+aaoiuZjZpm5plf/iqIwB5IytCve6ZkryBT91GfzBIKMOGg=='
            ],
            [
                'class' => Bfecb::class,
                'encryptedText' => 'WXOfv0n/wevGdbvVKfHmfpdatU6Raj5s4fy/xQkE84bOzTHSC/KlQBZONgjMFFF8XSJLj+5Ea6o='
            ],
            [
                'class' => Camellia128ecb::class,
                'encryptedText' => 'qb/Erl+Etmjggjj3By4iglx+fy/H2M9Npnfn8OL3Y4j89JaZqcZjnFakaOiVISLFCdxG/hF16HNdXOrLbz0W8g=='
            ],
            [
                'class' => Camellia192ecb::class,
                'encryptedText' => '7YZW/ILobjYUtbrHTY08zqR/l49KK08jEsiaRDzQHY6oVAkNy9vl/Nma6f9iyEFP9g3OOW3ElEGNRQnSG/r2cg=='
            ],
            [
                'class' => Camellia256ecb::class,
                'encryptedText' => '4x3qqb+Q8+EivbWDrDvz4ospB+7b7KsYN3TrJ3VBPSjtx3Wrc1YERcwI9GF+Zzpm3DlFarzF2MjkJEWv/c7dLA=='
            ],
            [
                'class' => Cast5ecb::class,
                'encryptedText' => 'Vt03NULH2QJbeP6V3OEcpZyttKQtAHWIJA3luon6gxwpvn0Xb5mjisOy0q5ByEWBOHmb8LV17Tk='
            ],
            [
                'class' => Desecb::class,
                'encryptedText' => 'V2RvqKLxdnr6jqc+brUypPo3E3wJvsxqjV2EA3fEY0zC/zLJ1WkvR82xF3W4BnJH3GRr2Tvw1lI='
            ],
            [
                'class' => Ideaecb::class,
                'encryptedText' => 'bGoLyogd8NFiU3gWIBttT4ktgFceM4BhGx0GRPjYbNVw+6+ipCX3mUrdSRmMIMMx+fVxVmS13zY='
            ],
            [
                'class' => Rc2ecb::class,
                'encryptedText' => '+vq0j35kRnF4piPg108iMsoY3rZ9H+HVw7u87V4wvUozeky78qxcJhjz1DShFB0S/ZdbM6RLwsU='
            ],
            [
                'class' => Seedecb::class,
                'encryptedText' => 'W0G99ubGRwwSfeVR6yLKvssfuqdCbm66zaqSJIavB1lvFqNgg7x9T5LR2nNbRgUeZnUR7snb6QGkdYK7DPfQrA=='
            ],
            [
                'class' => Sm4ecb::class,
                'encryptedText' => 'JjcdgcTHcEFgdKULv7tB8JX2ncfOSN1Lv2XlVbmOdBGH/kQKUctfzmOTS3DL3bSYFnKKXgoR4dcCPjAF/pjh+A=='
            ],
        ];
    }
}
