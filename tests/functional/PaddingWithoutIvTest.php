<?php

namespace functional;

use Encryption\Cipher\AES\Aes128cbc;
use Encryption\Cipher\AES\Aes128cfb;
use Encryption\Cipher\AES\Aes128cfb1;
use Encryption\Cipher\AES\Aes128cfb8;
use Encryption\Cipher\AES\Aes128ctr;
use Encryption\Cipher\AES\Aes128ecb;
use Encryption\Cipher\AES\Aes128ofb;
use Encryption\Cipher\AES\Aes128xts;
use Encryption\Cipher\AES\Aes192cbc;
use Encryption\Cipher\AES\Aes192cfb;
use Encryption\Cipher\AES\Aes192cfb1;
use Encryption\Cipher\AES\Aes192cfb8;
use Encryption\Cipher\AES\Aes192ctr;
use Encryption\Cipher\AES\Aes192ecb;
use Encryption\Cipher\AES\Aes192ofb;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Cipher\AES\Aes256cfb;
use Encryption\Cipher\AES\Aes256cfb1;
use Encryption\Cipher\AES\Aes256cfb8;
use Encryption\Cipher\AES\Aes256ctr;
use Encryption\Cipher\AES\Aes256ecb;
use Encryption\Cipher\AES\Aes256ofb;
use Encryption\Cipher\AES\Aes256xts;
use Encryption\Cipher\ARIA\Aria128cbc;
use Encryption\Cipher\ARIA\Aria128cfb;
use Encryption\Cipher\ARIA\Aria128cfb1;
use Encryption\Cipher\ARIA\Aria128cfb8;
use Encryption\Cipher\ARIA\Aria128ctr;
use Encryption\Cipher\ARIA\Aria128ecb;
use Encryption\Cipher\ARIA\Aria128ofb;
use Encryption\Cipher\ARIA\Aria192cbc;
use Encryption\Cipher\ARIA\Aria192cfb;
use Encryption\Cipher\ARIA\Aria192cfb1;
use Encryption\Cipher\ARIA\Aria192cfb8;
use Encryption\Cipher\ARIA\Aria192ctr;
use Encryption\Cipher\ARIA\Aria192ecb;
use Encryption\Cipher\ARIA\Aria192ofb;
use Encryption\Cipher\ARIA\Aria256cbc;
use Encryption\Cipher\ARIA\Aria256cfb;
use Encryption\Cipher\ARIA\Aria256cfb1;
use Encryption\Cipher\ARIA\Aria256cfb8;
use Encryption\Cipher\ARIA\Aria256ctr;
use Encryption\Cipher\ARIA\Aria256ecb;
use Encryption\Cipher\ARIA\Aria256ofb;
use Encryption\Cipher\BF\Bfcbc;
use Encryption\Cipher\BF\Bfcfb;
use Encryption\Cipher\BF\Bfecb;
use Encryption\Cipher\BF\Bfofb;
use Encryption\Cipher\CAMELLIA\Camellia128cbc;
use Encryption\Cipher\CAMELLIA\Camellia128cfb;
use Encryption\Cipher\CAMELLIA\Camellia128cfb1;
use Encryption\Cipher\CAMELLIA\Camellia128cfb8;
use Encryption\Cipher\CAMELLIA\Camellia128ctr;
use Encryption\Cipher\CAMELLIA\Camellia128ecb;
use Encryption\Cipher\CAMELLIA\Camellia128ofb;
use Encryption\Cipher\CAMELLIA\Camellia192cbc;
use Encryption\Cipher\CAMELLIA\Camellia192cfb;
use Encryption\Cipher\CAMELLIA\Camellia192cfb1;
use Encryption\Cipher\CAMELLIA\Camellia192cfb8;
use Encryption\Cipher\CAMELLIA\Camellia192ctr;
use Encryption\Cipher\CAMELLIA\Camellia192ecb;
use Encryption\Cipher\CAMELLIA\Camellia192ofb;
use Encryption\Cipher\CAMELLIA\Camellia256cbc;
use Encryption\Cipher\CAMELLIA\Camellia256cfb;
use Encryption\Cipher\CAMELLIA\Camellia256cfb1;
use Encryption\Cipher\CAMELLIA\Camellia256cfb8;
use Encryption\Cipher\CAMELLIA\Camellia256ctr;
use Encryption\Cipher\CAMELLIA\Camellia256ecb;
use Encryption\Cipher\CAMELLIA\Camellia256ofb;
use Encryption\Cipher\CAST5\Cast5cbc;
use Encryption\Cipher\CAST5\Cast5cfb;
use Encryption\Cipher\CAST5\Cast5ecb;
use Encryption\Cipher\CAST5\Cast5ofb;
use Encryption\Cipher\CHACHA20\Chacha20;
use Encryption\Cipher\CHACHA20\Chacha20poly1305;
use Encryption\Cipher\DES\Descbc;
use Encryption\Cipher\DES\Descfb;
use Encryption\Cipher\DES\Descfb1;
use Encryption\Cipher\DES\Descfb8;
use Encryption\Cipher\DES\Desecb;
use Encryption\Cipher\DES\Desede;
use Encryption\Cipher\DES\Desede3;
use Encryption\Cipher\DES\Desede3cbc;
use Encryption\Cipher\DES\Desede3cfb;
use Encryption\Cipher\DES\Desede3cfb1;
use Encryption\Cipher\DES\Desede3cfb8;
use Encryption\Cipher\DES\Desede3ofb;
use Encryption\Cipher\DES\Desedecbc;
use Encryption\Cipher\DES\Desedecfb;
use Encryption\Cipher\DES\Desedeofb;
use Encryption\Cipher\DES\Desofb;
use Encryption\Cipher\DESX\Desxcbc;
use Encryption\Cipher\IDEA\Ideacbc;
use Encryption\Cipher\IDEA\Ideacfb;
use Encryption\Cipher\IDEA\Ideaecb;
use Encryption\Cipher\IDEA\Ideaofb;
use Encryption\Cipher\RC2\Rc240cbc;
use Encryption\Cipher\RC2\Rc264cbc;
use Encryption\Cipher\RC2\Rc2cbc;
use Encryption\Cipher\RC2\Rc2cfb;
use Encryption\Cipher\RC2\Rc2ecb;
use Encryption\Cipher\RC2\Rc2ofb;
use Encryption\Cipher\RC4\Rc4;
use Encryption\Cipher\RC4\Rc440;
use Encryption\Cipher\RC4\Rc4hmacmd5;
use Encryption\Cipher\SEED\Seedcbc;
use Encryption\Cipher\SEED\Seedcfb;
use Encryption\Cipher\SEED\Seedecb;
use Encryption\Cipher\SEED\Seedofb;
use Encryption\Cipher\SM4\Sm4cbc;
use Encryption\Cipher\SM4\Sm4cfb;
use Encryption\Cipher\SM4\Sm4ctr;
use Encryption\Cipher\SM4\Sm4ecb;
use Encryption\Cipher\SM4\Sm4ofb;
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
                'class' => Desede::class,
                'encryptedText' => 'ORdyjY2C/bVRCCDfzGCvK36NVYzhJSzpv6oVJzeK5hL7378Odi3aDiza3X7hKKkG5HVmNal7wqM='
            ],
            [
                'class' => Desede3::class,
                'encryptedText' => 'WQ5+KcAAXzLeTZQ5xpj3F8kMTTtmo25P1VuYq2k19z1Wppe5x6BplIE3X8lxdQ89zma4MrHzPNo='
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
                'class' => Rc4::class,
                'encryptedText' => 'PoEWhBFMQDYtHBigLsYOYmq7lXC3dZBq30a8BPfcuSSMK9h82AJDShNnGu9/D8WW'
            ],
            [
                'class' => Rc440::class,
                'encryptedText' => '8cC5PD3E/CtDjCn27VBbCxI4cUD0BkNE7v5DyxFdxMkYaENJc7Dggfqe83JuRc7P'
            ],
            [
                'class' => Rc4hmacmd5::class,
                'encryptedText' => 'PoEWhBFMQDYtHBigLsYOYmq7lXC3dZBq30a8BPfcuSSMK9h82AJDShNnGu9/D8WW'
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
