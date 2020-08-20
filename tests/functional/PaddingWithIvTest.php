<?php

namespace functional;

use Encryption\Cipher\AES\Aes128cbc;
use Encryption\Cipher\AES\Aes128cfb;
use Encryption\Cipher\AES\Aes128cfb1;
use Encryption\Cipher\AES\Aes128cfb8;
use Encryption\Cipher\AES\Aes128ctr;
use Encryption\Cipher\AES\Aes128ofb;
use Encryption\Cipher\AES\Aes128xts;
use Encryption\Cipher\AES\Aes192cbc;
use Encryption\Cipher\AES\Aes192cfb;
use Encryption\Cipher\AES\Aes192cfb1;
use Encryption\Cipher\AES\Aes192cfb8;
use Encryption\Cipher\AES\Aes192ctr;
use Encryption\Cipher\AES\Aes192ofb;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Cipher\AES\Aes256cfb;
use Encryption\Cipher\AES\Aes256cfb1;
use Encryption\Cipher\AES\Aes256cfb8;
use Encryption\Cipher\AES\Aes256ctr;
use Encryption\Cipher\AES\Aes256ofb;
use Encryption\Cipher\AES\Aes256xts;
use Encryption\Cipher\ARIA\Aria128cbc;
use Encryption\Cipher\ARIA\Aria128cfb;
use Encryption\Cipher\ARIA\Aria128cfb1;
use Encryption\Cipher\ARIA\Aria128cfb8;
use Encryption\Cipher\ARIA\Aria128ctr;
use Encryption\Cipher\ARIA\Aria128ofb;
use Encryption\Cipher\ARIA\Aria192cbc;
use Encryption\Cipher\ARIA\Aria192cfb;
use Encryption\Cipher\ARIA\Aria192cfb1;
use Encryption\Cipher\ARIA\Aria192cfb8;
use Encryption\Cipher\ARIA\Aria192ctr;
use Encryption\Cipher\ARIA\Aria192ofb;
use Encryption\Cipher\ARIA\Aria256cbc;
use Encryption\Cipher\ARIA\Aria256cfb;
use Encryption\Cipher\ARIA\Aria256cfb1;
use Encryption\Cipher\ARIA\Aria256cfb8;
use Encryption\Cipher\ARIA\Aria256ctr;
use Encryption\Cipher\ARIA\Aria256ofb;
use Encryption\Cipher\BF\Bfcbc;
use Encryption\Cipher\BF\Bfcfb;
use Encryption\Cipher\BF\Bfofb;
use Encryption\Cipher\CAMELLIA\Camellia128cbc;
use Encryption\Cipher\CAMELLIA\Camellia128cfb;
use Encryption\Cipher\CAMELLIA\Camellia128cfb1;
use Encryption\Cipher\CAMELLIA\Camellia128cfb8;
use Encryption\Cipher\CAMELLIA\Camellia128ctr;
use Encryption\Cipher\CAMELLIA\Camellia128ofb;
use Encryption\Cipher\CAMELLIA\Camellia192cbc;
use Encryption\Cipher\CAMELLIA\Camellia192cfb;
use Encryption\Cipher\CAMELLIA\Camellia192cfb1;
use Encryption\Cipher\CAMELLIA\Camellia192cfb8;
use Encryption\Cipher\CAMELLIA\Camellia192ctr;
use Encryption\Cipher\CAMELLIA\Camellia192ofb;
use Encryption\Cipher\CAMELLIA\Camellia256cbc;
use Encryption\Cipher\CAMELLIA\Camellia256cfb;
use Encryption\Cipher\CAMELLIA\Camellia256cfb1;
use Encryption\Cipher\CAMELLIA\Camellia256cfb8;
use Encryption\Cipher\CAMELLIA\Camellia256ctr;
use Encryption\Cipher\CAMELLIA\Camellia256ofb;
use Encryption\Cipher\CAST5\Cast5cbc;
use Encryption\Cipher\CAST5\Cast5cfb;
use Encryption\Cipher\CAST5\Cast5ofb;
use Encryption\Cipher\CHACHA20\Chacha20;
use Encryption\Cipher\CHACHA20\Chacha20poly1305;
use Encryption\Cipher\DES\Descbc;
use Encryption\Cipher\DES\Descfb;
use Encryption\Cipher\DES\Descfb1;
use Encryption\Cipher\DES\Descfb8;
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
use Encryption\Cipher\IDEA\Ideaofb;
use Encryption\Cipher\RC2\Rc240cbc;
use Encryption\Cipher\RC2\Rc264cbc;
use Encryption\Cipher\RC2\Rc2cbc;
use Encryption\Cipher\RC2\Rc2cfb;
use Encryption\Cipher\RC2\Rc2ofb;
use Encryption\Cipher\SEED\Seedcbc;
use Encryption\Cipher\SEED\Seedcfb;
use Encryption\Cipher\SEED\Seedofb;
use Encryption\Cipher\SM4\Sm4cbc;
use Encryption\Cipher\SM4\Sm4cfb;
use Encryption\Cipher\SM4\Sm4ctr;
use Encryption\Cipher\SM4\Sm4ofb;
use PHPUnit\Framework\TestCase;

class PaddingWithIvTest extends TestCase
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
     * @param $iv
     * @param $encrypted
     */
    public function testCiphersWithPaddingAndIv($cipher, $iv, $encrypted): void
    {
        $encryptionObject = new $cipher();
        $iv = base64_decode($iv);
        $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key, $iv);
        $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key, $iv);
        self::assertEquals($encrypted, $encryptedText);
        self::assertEquals($this->plainText, $decrytpedText);
    }

    public function dataProvider(): array
    {
        return [
            [
                'class' => Aes128cbc::class,
                'iv' => 'Ko5nqZo8gvbbgNdNpmta+Q==',
                'encryptedText' => '0mnq7zllazlqOgpn4AS0Nr8jzjRP07aMjhM7culTQBNAdLGArDQ41VW9/1sy9KWu5E9qLrHVri8Eue39zlZmrQ=='
            ],
            [
                'class' => Aes128cfb::class,
                'iv' => 'rGDg6eyiS0U6hAyC141dDQ==',
                'encryptedText' => '2S6L6QPgCH/IhZLhK2RoX31Vzmal2pLtV9YmEElTpAdNe8pShDeUY2Z1qnbw6xfg'
            ],
            [
                'class' => Aes128cfb1::class,
                'iv' => 'eJmCIxpvG+tp8yn7h8dXPg==',
                'encryptedText' => 'FY4hzdOexT1zqciDKpV8qq3wyU8YAXiR3S3smg/KAtaCWTftY8PoB/SAZyc5aGj+'
            ],
            [
                'class' => Aes128cfb8::class,
                'iv' => '17bNdR8U1bf7toiPbIgh+A==',
                'encryptedText' => 'XAJR43YX5aMrwviHFSWSVZZV0pUs3Dcv5k00CltaYJLkEJULi0/5m8tgXLVn43XD'
            ],
            [
                'class' => Aes128ctr::class,
                'iv' => 'xnmxSZLAmWDvQvjzGM94ng==',
                'encryptedText' => 'PiP0j7qDRDkbUikgZNVRiQOLmDoFqrQf4VM6u2jpM34g9Kf4Kb9QdSVT84ZnIjm+'
            ],
            [
                'class' => Aes128ofb::class,
                'iv' => '+DZibqa1UV52kyKulFfHRQ==',
                'encryptedText' => 'BAosVkvGHCtGPbtfqgT24EeGKE9jgGGWLm2xb0UXgYPOSOIc8FoJzJSSpSku51XM'
            ],
            [
                'class' => Aes128xts::class,
                'iv' => '9MXRiMCxg2/DC7HBX+Qhkw==',
                'encryptedText' => '6ejYPGqOoTVFVDGLwGvVMNx/XUtkBkNtcCP5P/R8DXXKjhYiqc6wNGFq4TOUFfmb'
            ],
            [
                'class' => Aes192cbc::class,
                'iv' => 'JdhSNM+97hdRtTCXndNYEA==',
                'encryptedText' => 'D3wiQn0mQvT9x9HlrxCC7sfPdvY3FBFDISLwECzvFsGf4ongJXPcIwcBSSrSgvCc3vbDtis8V87aCeECSFL15A=='
            ],
            [
                'class' => Aes192cfb::class,
                'iv' => 'Pn/w2aevuSFL8T7UQ9/eLA==',
                'encryptedText' => 'pDub2gOXL5J1aw3ljhQUCTTkcfemJasWalIwIbCs0OLallE+GYu2k1Zo0t8tXHq8'
            ],
            [
                'class' => Aes192cfb1::class,
                'iv' => 'SMpsBYS8X3vq9L3WKNO/ZA==',
                'encryptedText' => 'ovHUrXRg1izT2Gh1Pe+UMUPS2IJv+opixUWXUVk0H97z5lMynxHZQ/Z9Or3QxSot'
            ],
            [
                'class' => Aes192cfb8::class,
                'iv' => 'gpv8FBmrDCZTpqlDycXr2w==',
                'encryptedText' => 'iDKxjvIxgGHsXKRoKrdud2CWHx8EgT2UWRBWVlPNVgLSBsFkiyWBMymD5nQ9+e0z'
            ],
            [
                'class' => Aes192ctr::class,
                'iv' => 'B0OyQ7HJwC80v6lsS30CNg==',
                'encryptedText' => 'CGZb+GqJNozVW23mB7AtHck7ak2CinF960Yjyxm1uCfHG3FEU7WM3SJgg34HHPmc'
            ],
            [
                'class' => Aes192ofb::class,
                'iv' => '+9SVXwpXbH7YKxH/1GWEjw==',
                'encryptedText' => 'gh335KdjyDDdllvAEKxLtBULl5L7GW/khxVnvdvInG/TLzgl/p9o/T7Z0T+fNJYa'
            ],
            [
                'class' => Aes256cbc::class,
                'iv' => 'E6x/xZzyU1ipuTUBHDbVoQ==',
                'encryptedText' => 'ynqrmRUG4FbnkLIF4rnC4jmufvEBEn8YBycxagjsk38NTgyomXiiNURrYqSUYDgKxTSVoXMZ613ReAWIpQHp+w=='
            ],
            [
                'class' => Aes256cfb::class,
                'iv' => 'xIhguz7PDWC2AiSteSfT/Q==',
                'encryptedText' => 'FwQvHMyJvhRF86IqWoYJmT0T5g1bpO/QHREqAaW24YPxdNKb+QqP51N5CPPuZfkx'
            ],
            [
                'class' => Aes256cfb1::class,
                'iv' => '+W8f2UJjwew5f7lOug9E2g==',
                'encryptedText' => 'w+Wmamp7LMhX599gwpDDVfjCJI748emFT10y3/9Y9Mvk+S2ItBr0s7sAASgESFqx'
            ],
            [
                'class' => Aes256cfb8::class,
                'iv' => 'Z/XHVDPH2CYhDyhDirI+zg==',
                'encryptedText' => 'tf+uqsOHEh4dD1+Sv/J566gEwCOd2WD23d5OHbGsR45DkS3t4/M9uRERnUEd5PXl'
            ],
            [
                'class' => Aes256ctr::class,
                'iv' => 'mabiJBfbCJYh9KTRFCNIfg==',
                'encryptedText' => '9eTnD+rcnl4/xMyHG16nOAtj+Cm0jZDkAghhbMCkcoXs6vN+zeVYgvc0zUt6CBJ7'
            ],
            [
                'class' => Aes256ofb::class,
                'iv' => 'LNs7SVu2RlMNw8v0cH4KGQ==',
                'encryptedText' => 'V5nWoX77TqSel6Ns0k9YZ/Nw7Euhh6hAvuwrTmEGFQ49vyxk6EovlVmptT7d51YD'
            ],
            [
                'class' => Aes256xts::class,
                'iv' => 'zfxvYnEz9z693Cq5BZbgVQ==',
                'encryptedText' => 'O9cdq5cZYfFzxhsNekBHVYYMaDMu7Exo7OTAiZdqbzbnfVRbZfCxJ+39mx/lW1OJ'
            ],
            [
                'class' => Aria128cbc::class,
                'iv' => 's9LxElFYHqlYwpDFHFq2rw==',
                'encryptedText' => 'nya/cycQjuS6iESDcx+T7LNiXatcuUmhcypR7Rnhly/QoZLdK2MCmVU2/Yb1B3TzGYxLBdnXafjWWf0mZE+TPQ=='
            ],
            [
                'class' => Aria128cfb::class,
                'iv' => 'Ejz4wlvuwjyzOr0iQLZHig==',
                'encryptedText' => 'T9QFFJYqZ64qjn+d5zXFKL2v1Ym57vFvFrJnHoS2NZDOiSZNnEQ+8SOIYAqDhMEE'
            ],
            [
                'class' => Aria128cfb1::class,
                'iv' => 'IuJ3Af1hKbhLm5lTLo21+w==',
                'encryptedText' => 'VU6EJS4HGMnRGXIzW63uDK2cIGD83+Hj42xumUqrrduLCzE7b/TQcaNuOxMh5fol'
            ],
            [
                'class' => Aria128cfb8::class,
                'iv' => 'yGivnwZynWLxeZIDfr1FRg==',
                'encryptedText' => 'niEU5Un7WBHRCfvDmZ+XKsIPyUKe3Rg8Zc9an0vJXy+1wfJfH6+5s+Nj/lCyrdv7'
            ],
            [
                'class' => Aria128ctr::class,
                'iv' => 'epuGNX+p8E/1pS8axTLPRA==',
                'encryptedText' => 'nnwln9jr3YXmo/pXUxu5C7wC+A5qYL5s5QQFUo64gPP2rfycx+nWaiP3dV5n3tDo'
            ],
            [
                'class' => Aria128ofb::class,
                'iv' => 'sxTGsjO2UBDUvmgR4xRTqA==',
                'encryptedText' => 'pkJsqzUGn/03B7Sza33ri3HnECC5RtyuCDrl0poIaLsnYF2iPZ6nn+5D9GS/17Y1'
            ],
            [
                'class' => Aria192cbc::class,
                'iv' => 'tqzT2GomXm9UskfBRI59Fg==',
                'encryptedText' => '+tGIKkAze4uuXq4EoQW/q9x6Mm8J1sv5plsQtnDtr1u/g3u/UL3+rRP3zX6Ajra1cbKFOS2cpL/tHXojwaAZqQ=='
            ],
            [
                'class' => Aria192cfb::class,
                'iv' => 'B5hl5acvCN2i8dRsBDpNzw==',
                'encryptedText' => 'OVD1UynoRrcy2I9inrW2hfML+XEwaUzyLUO5545BprgENQNLvE6BG31mztnbQeET'
            ],
            [
                'class' => Aria192cfb1::class,
                'iv' => 'nYE3uQ+JQoJj2VXGebRYlQ==',
                'encryptedText' => 'G81SZoTltxKgwzuizpWevMqKowfAGW2ohwQXtD2sQno1wUGiWXKJBgdeUdg+C61J'
            ],
            [
                'class' => Aria192cfb8::class,
                'iv' => 'FU4QyXjw9oF8Swq/xmn7Ng==',
                'encryptedText' => 'p5W9FhAZUI8HDIqphMyqkfj6s8/MbJIocubxivRm9eVNDDAGZwSQ9qmicy+qubtn'
            ],
            [
                'class' => Aria192ctr::class,
                'iv' => '+EXCaZTm2MdT/IC9zGL3vw==',
                'encryptedText' => 'rCiDAlby7Frd8FHqUf+Z2hXgLwNNlO8CI/BO/sGIGO4oHaqVjLFXwOkZbkYchenF'
            ],
            [
                'class' => Aria192ofb::class,
                'iv' => '6YehsdnYJ43c/UAydLzsiA==',
                'encryptedText' => 'TVL+AXJsUGQwxMlC7z8yS4jRjWtYmnKahfjkJ/QHKjxbebVKQbq80moWPErqoPbv'
            ],
            [
                'class' => Aria256cbc::class,
                'iv' => 'm0dn74sKTGz/KmP7E4o+Eg==',
                'encryptedText' => 'kC117CZjK0MFTWuPrwiO44LM4qPTCijbXRhv7gx5iguXyn9ATaJXFZ8Hh7Kg7Y7UuMrI2fcrvOaroYHwEGWm0A=='
            ],
            [
                'class' => Aria256cfb::class,
                'iv' => 'kpeTtJcPq/w5HePYsOg5Dw==',
                'encryptedText' => 'ntIZc7WtvcO53AG3rki/SXAb9JlhLWJxgpxxYWaJxI3hhUUJkRneVD+3liZ57U0e'
            ],
            [
                'class' => Aria256cfb1::class,
                'iv' => 'D2yj6QjRKqu+5J8URRU3hA==',
                'encryptedText' => 'fjgXZPoh6jPePfTAuQXOLm9ADtI78gl5od6TJYQDMFyJhn5n3UUgq3NZ8VI0qBOw'
            ],
            [
                'class' => Aria256cfb8::class,
                'iv' => 'sNKOwTYdOveZPr0Ti85jSQ==',
                'encryptedText' => 'k0GT4su8nAtP6PN3y31SZNktyeJIHIjEBWArs48Ex7UO0qC3Oo8HDl9WYXT0WwuP'
            ],
            [
                'class' => Aria256ctr::class,
                'iv' => 'kPwKtRzc/zZm1vCyu85dsg==',
                'encryptedText' => '1GOJX34tS/5v1vzGg8YeDDRIHNEEuRnIFCh0CR7A/1ILfJd5NihTECuYhZ8MQArw'
            ],
            [
                'class' => Aria256ofb::class,
                'iv' => 'fQedAvZABBAuE03uxJRFGA==',
                'encryptedText' => 'VrOmnNffRH2IFkJTRP86v0ZQA2XNx7e/RHLYmJhKOR7GlZJz6xpl6AfmYEZHIp4F'
            ],
            [
                'class' => Bfcbc::class,
                'iv' => 'Yj0g/qNS/8Y=',
                'encryptedText' => '5sizmXtXFCa03gUhoLJMoqdDSYc2QacRZA7EwmtiTbErf85aKJ2TywLlmnrfMkGX2RYLBMn6jKw='
            ],
            [
                'class' => Bfcfb::class,
                'iv' => '+f3xZ/BeNR0=',
                'encryptedText' => 'FTF+TZZDj2pNrTYLrtzTH0BlkCLsxFvWTph982YbwM7jbUhdkm7aQ4dFG4bwXsak'
            ],
            [
                'class' => Bfofb::class,
                'iv' => 'O29opuGmc6g=',
                'encryptedText' => 'B5aBkMLHUZelBX+R0e6ZtodxtdbgcYOAx/0UIRpnbdkc+telv7Yrl6tQmcNOdI9l'
            ],
            [
                'class' => Camellia128cbc::class,
                'iv' => 'VeuzLApI5LeQFO/JkY6MiA==',
                'encryptedText' => 'cmHpfq5UZYapaikFirlYcIIj6mJ6g1SJVw46C9s+JUM1QsBTve4LqVFZFrt/cT9KveEwYI79Xlxaue7+qClHsA=='
            ],
            [
                'class' => Camellia128cfb::class,
                'iv' => 'FJIbFyJDcE39QFVxDEvhOg==',
                'encryptedText' => 'uUtEiAt/St9AkBRgmkQD0Z9dhI/EBzhGSB+OqWYlCrMpnq5wU25hPjTdQ2MYNtjA'
            ],
            [
                'class' => Camellia128cfb1::class,
                'iv' => 'osGyGH8rnwOqrVQNJYHc8A==',
                'encryptedText' => 'NCh7XYoXrwwNxLICQMJ/8/uGKaqsvUvgwMLV1yTjExVIFIVWN3a2Ds++a1kFDRKZ'
            ],
            [
                'class' => Camellia128cfb8::class,
                'iv' => 'nf6Ff0aOJGGuUXL3p+lChg==',
                'encryptedText' => 'BTf2lga95EIMDbYP5RvQJH+LqJSrmWPVhWoAD2bn07UEsb7uG182OYApbLVbeASS'
            ],
            [
                'class' => Camellia128ctr::class,
                'iv' => 'MxtiFbUgWOgF1/m8Fcmm3Q==',
                'encryptedText' => 'xN13AoTNZkmyhL/rc6ELDXDKBfVHxYMWPlslLEvsUPdnONm79LfsDCP3r1+nxN5N'
            ],
            [
                'class' => Camellia128ofb::class,
                'iv' => 'R43h2+sODwSA5BY2+BesdA==',
                'encryptedText' => 'zQ1rTcAYJT9piBRQNh5LO5Kf72nUKY927EgcNI/jYTUysHyp7knupGCMq3F9xdvO'
            ],
            [
                'class' => Camellia192cbc::class,
                'iv' => 'I9BT4RjFZfOA11ID2qsoHw==',
                'encryptedText' => 'H7ZZ5avFrJ1F1VtDo+54WOTeVELZqCPGshUN+irqkVmL9WK7AYH9OaJN1VkWm9Msg/SXbDHjFRwdSH+nozaTgw=='
            ],
            [
                'class' => Camellia192cfb::class,
                'iv' => 'fIiMS1AFxLhCGQ4v3itCkA==',
                'encryptedText' => '158F8uajWUdCg8y1XMpjUOe8gFM1iAr92Qx75l0sfTLHwbDA57Yjmhd66BGQZ/z5'
            ],
            [
                'class' => Camellia192cfb1::class,
                'iv' => 'UbCv3wDpSAXNGPhAjT2vow==',
                'encryptedText' => 'DorMMIb28p8rm88sizwOBLYGWd0Q6keeptThahczSd+0s8gNErkYA4a3kx5HZtsc'
            ],
            [
                'class' => Camellia192cfb8::class,
                'iv' => '6+HWdJ13yXeKbQC4ML1Gtw==',
                'encryptedText' => '/iJn5frNhbrzJQucPlg0JRMV2R4iyUMwUrigshuLl9LYTOg+uV5WxbTv37DtJ4rl'
            ],
            [
                'class' => Camellia192ctr::class,
                'iv' => '4D1IAI8iNgwNOJkS2WnaBg==',
                'encryptedText' => 'yhxGnGjKzBa0iKswMw1ratsDRgDaOwHStGAYbsqia0sQBYbhOCRAG3hUUKHkHxB9'
            ],
            [
                'class' => Camellia192ofb::class,
                'iv' => 'cl7mRuLiUCF/MODTd9aYtA==',
                'encryptedText' => 'Abp0YxRGrYKvgDTZgV4SA1vO8ezzn+LcJEjNosEYGEk4QlMIQJ8Nv2jWf/bERxwo'
            ],
            [
                'class' => Camellia256cbc::class,
                'iv' => 'eCk5b+VX6hGg2+11DshsYg==',
                'encryptedText' => 'qSon/aj4JsjhpnniLadOONXmGo53SsYVlLHc8JjpxYDrO/e1ZekIYDyrcRuf0ryFd3Us+PnHbo5zHMTIo2tLbQ=='
            ],
            [
                'class' => Camellia256cfb::class,
                'iv' => 'ChtT07qVOwbN0s537jSF/w==',
                'encryptedText' => 'R6ZXipR++4m/hUlxMm5OcFI9yad1T4fJwzeZ1tzPRvBrUforUK++D6uSMnHVQJ9p'
            ],
            [
                'class' => Camellia256cfb1::class,
                'iv' => 'Vqmk/Gy+2UbDAYOp35IYCw==',
                'encryptedText' => 'sK9IsQOnkca2o/ZpoCGbUQg+RHrtxRqyWTmfRwXa8u5zsd5wkXaHzzH/Z65QyLjl'
            ],
            [
                'class' => Camellia256cfb8::class,
                'iv' => 'j7toi9A/PWYIqfh527hdUw==',
                'encryptedText' => '+IwtWLBW4qQmileH2n23dB5YWxNMIw3ijZvub5M6ZTpn/zqJZVTyKUiYoO8N5seL'
            ],
            [
                'class' => Camellia256ctr::class,
                'iv' => 'noE5L4D39ffIMXamSQZy1g==',
                'encryptedText' => 'Dv2VuOFwstJRNa97J/w+K/s+P42vE3CuyJaDCacwRhwaHiZ6TI1iJ9jZPNZfaW9a'
            ],
            [
                'class' => Camellia256ofb::class,
                'iv' => 'S2BMfqw/BUVTJ5oEhhVfUw==',
                'encryptedText' => 'YZMwz6vaL2muW52WpiW/EoyTXsNgbuLjTc5mDv4wBPDyrVqgoh7oaCURAnf9xurQ'
            ],
            [
                'class' => Cast5cbc::class,
                'iv' => 'x+CuJXEm0Yo=',
                'encryptedText' => 'FRJ9PaGShicTA9Y2fhMf/OBMXzXRZBPUSVCD1EqFpUCsa+xUA7UkvgOBuyOO1VftGoq9uC4m9Qw='
            ],
            [
                'class' => Cast5cfb::class,
                'iv' => 'F1fWem7AaV0=',
                'encryptedText' => 'sEDpv4JG4bWnzbxcyWZPqGmuHUlNJtSrdX4xH6UGptsdE2FWPWz3CRWrMtz6mKXW'
            ],
            [
                'class' => Cast5ofb::class,
                'iv' => 'KifjEB4ggxU=',
                'encryptedText' => 'Pm6ZghFe8ET1UGNHPIXFn4E6WNX2j53xJk3vRaskJdR1NW6up6p5uJkiC13kNt+p'
            ],
            [
                'class' => Chacha20::class,
                'iv' => 'kJYkRqe76Ph7Tn/X3Lmbcw==',
                'encryptedText' => 'GeGJev62P4GN5odLyWxfx0NU0WklMBoqt0AV9GSGpX5REL4VCGzpi7zYvVp5/NDP'
            ],
            [
                'class' => Chacha20poly1305::class,
                'iv' => 'Q9acp05xGsndYrIg',
                'encryptedText' => 'DtEGTjk7wtCgiVvPwt1gxb422IMul+j2VNp46c3JYbkEN+TeExIhpPUxJpFQ+vpM'
            ],
            [
                'class' => Descbc::class,
                'iv' => 't276c7y6L90=',
                'encryptedText' => 'xga0aJ0QlQxS0kEE7iTGrenY0QHKWj8oHiHNg8UrDGVChw+PFXD0eblyYRbJtgOdjMam4kQ/hS4='
            ],
            [
                'class' => Descfb::class,
                'iv' => 'EzM5FLxgixM=',
                'encryptedText' => 'vgYAL3rNZ6uCCSPBWMcEGHjcI7BcCnUYJV2rvnhdrj+jKszdwuy7NrI8TEnsHDmy'
            ],
            [
                'class' => Descfb1::class,
                'iv' => 'kkj2bZ3dO1A=',
                'encryptedText' => 'VKWNp+XVdKM3ecDCmTUiG7hG8Rogpb8W/ZKma0YYP5gRoUvHEgCxKEoIVnjpvChM'
            ],
            [
                'class' => Descfb8::class,
                'iv' => '42jK83HETek=',
                'encryptedText' => 'MA5dslWJQ0G0RRES7XdmtR2ZvY0RNCyLyxZfbcmmggh/k973z7C0Rk7aP/ri7jgy'
            ],
            [
                'class' => Desedecbc::class,
                'iv' => 'xty4sXywOXI=',
                'encryptedText' => 'FmGFM4ssll1xewiSw+Pj+Uvsqgmv3gfa7MsRIIXDN7OKs9ZoXjOi5EazXqAQU/N5/hlaIOMD+ck='
            ],
            [
                'class' => Desedecfb::class,
                'iv' => 'XdYRiu84IRY=',
                'encryptedText' => '1K0IjdHDBTH7ak16v7w1bLvFKltEp/OalaefFF/olA0jCrJkh0cJuNT2J10wyACe'
            ],
            [
                'class' => Desedeofb::class,
                'iv' => 'Y9rTeqyBh7U=',
                'encryptedText' => 'DMouOYADcUFqvM+V59Q8dNcycCeW9xGfhS3klvX73WKDZHzKDNGMGh3fqvLQgG4L'
            ],
            [
                'class' => Desede3cbc::class,
                'iv' => 'Oj1FnfQFF5E=',
                'encryptedText' => 'XwGUw7YHlLFgSqK+zS8g79A8t0++8zrr9Qa16yfAILIEtXo9ijzZv0tPbOVFJVFtRbBC17tKXlI='
            ],
            [
                'class' => Desede3cfb::class,
                'iv' => 'RKu49LHTv4I=',
                'encryptedText' => 'ccHD2fAMlOjX4nIEqa/MfnnqX8lV0R6EDsrH5WPpyhJuymIGqYUfxHmKi/FV/X+3'
            ],
            [
                'class' => Desede3cfb1::class,
                'iv' => 'AY1Tp760yek=',
                'encryptedText' => '0lGJZdAEixZ7W7vypsg2Cbl1GANBqBfRa+O0+42Uci36SHbOlg9FsfMbKzNnUHAW'
            ],
            [
                'class' => Desede3cfb8::class,
                'iv' => 'mnlAncvncn0=',
                'encryptedText' => 'ercOqYW5iAcyvs8aCgP8xe3Q2IC9yHNeaLsYeG1sZzANPGu0WJnU4O+ZaXANFKni'
            ],
            [
                'class' => Desede3ofb::class,
                'iv' => 'PKhlTYtL/Aw=',
                'encryptedText' => '4NABOBbHUh9NriiqwDujXv/hU7IlfVhwO5CQWZW6AcW3gNcp3U75BsmPoRpmS8Wd'
            ],
            [
                'class' => Desofb::class,
                'iv' => 'f3gdx3zTHAg=',
                'encryptedText' => 'n0SBBoDeESBoyFGBbbvjKvyAJXPxML5zGcqKO0ElLx9REPsC6WpcCvV3Qei+zZot'
            ],
            [
                'class' => Desxcbc::class,
                'iv' => 'NEuK+FSyEic=',
                'encryptedText' => 'F31ztWkq6ccf/3G0v6udi5lENJYMhZRaPlBr+KFqtkYVlr5YEXVRpeb3kbEFc/vAmxNUYuIi8vQ='
            ],
            [
                'class' => Ideacbc::class,
                'iv' => 'ZZ9Vsng1VPY=',
                'encryptedText' => 'i4ghLIfwZ475zj+YrHsQIQc+ndRg57TCFLpEwnuBoCApu7vFPZf+F3WGF/ushclbq8ZiO018dC4='
            ],
            [
                'class' => Ideacfb::class,
                'iv' => 'X6NpyMK9hqY=',
                'encryptedText' => 'JK7c0tj6ZW7t7UFYk5myii7aVF5BYJ6VhlqbkhaLqXmnZ4Z4kyeEcPPrBPJFd8YC'
            ],
            [
                'class' => Ideaofb::class,
                'iv' => 'COc7jn25x2o=',
                'encryptedText' => 'Q+QCcwOkzKoVbLwKSsBkAzRV4H4i9yjLLH/HfjFXvCdiogWxGJUgMRElq5w9ebTe'
            ],
            [
                'class' => Rc240cbc::class,
                'iv' => 'kq+c70vcXNc=',
                'encryptedText' => 'zgmD089sTT1ZiHB27jbFY2KuSykzwu0LulmMMo/BLm4vy5lIx/R2hptq6vkM3h1NeM7us0el+3Y='
            ],
            [
                'class' => Rc264cbc::class,
                'iv' => 'oIoSJA/qpbA=',
                'encryptedText' => 'dusa3T0SG3kdSP9qvp/mbJndu3oEqPmHbMPXa8/ixQpziwcE+EYsqwCGjDPpgAn8UkjhUB/sb48='
            ],
            [
                'class' => Rc2cbc::class,
                'iv' => 'QCdMdL+CdL8=',
                'encryptedText' => 'DEV4VdwESgqnwuxOT10YAyfCqnj6dyvqThp2k5O4q3l4MVoIY9N9dEDVMB4nuJnDOk8Se5gimXM='
            ],
            [
                'class' => Rc2cfb::class,
                'iv' => 'kca7Ut97NMU=',
                'encryptedText' => 'FQJX8hpvlUqdzCyc19Fp9ELhP9VFPL4THAaoZjdrPHRKMJf69KbuoZx+qu8tPcwZ'
            ],
            [
                'class' => Rc2ofb::class,
                'iv' => 'nvPClA6dMEg=',
                'encryptedText' => 'gVALXxBkZJST3q4tKTA8UOcDwgYjmknKvNdNWMbWdwEcTzL8RbazOCyYFc1rIwAF'
            ],
            [
                'class' => Seedcbc::class,
                'iv' => 'OQ8nyfZn+qQQK+n+WqXUsg==',
                'encryptedText' => 'gZixTByZuBnqzmcjHMKGc6NNuXA44BIkmh2mlxC8mQqni/Xh9MloUFhzW426xfJnUORWJ4F+2nMfBV3JXnlD4A=='
            ],
            [
                'class' => Seedcfb::class,
                'iv' => 'uu/sritYGy4xV/qLmGSNMA==',
                'encryptedText' => 'C4EeRMbnLhS8kzmsoG5uCyG+527Mbm1qvwco0KQ7uKLfmTgQU9WZ4J4a0MopBK8f'
            ],
            [
                'class' => Seedofb::class,
                'iv' => '9R1RiGjlNSfehdAhMiGQnw==',
                'encryptedText' => 'R4Q+hhkTuGY3EafV0RAxRN0iR38+mR74bnXDlUO4eOYeOZTL5BXuc7bOJHcAvIxf'
            ],
            [
                'class' => Sm4cbc::class,
                'iv' => '4ZL2TWTMwnT020T3DBmtoA==',
                'encryptedText' => 'zNVg8whOc7x9cLZz1ksxK4rf3lhWfZsWvX49mPxkzJdmzJPA8XQr/tt7DZ4EQ5Awky8GxiiH6YOz3+jhKAec1A=='
            ],
            [
                'class' => Sm4cfb::class,
                'iv' => 'GIgVI9m3G0Or5IV3h29Jmg==',
                'encryptedText' => 'zPO2kOpf8YgAGhxUeB8VDd50DPkRNQJfwyTozMJJ0nQ5BSM6B2jCLfBGfZPKPq26'
            ],
            [
                'class' => Sm4ctr::class,
                'iv' => 'Q5VPQBk1R6/eReFKzc8mSA==',
                'encryptedText' => 'cIpLximgGbWt+4O0tq12BxZrKUS10IVm7BeaT+y/jo5a29ugnFsGdTJcR99Y2WAV'
            ],
            [
                'class' => Sm4ofb::class,
                'iv' => '1+03H70byIfRy6gOPtoOlA==',
                'encryptedText' => 'lMkEEmqumBAcs06NPj+6C3MBioWYueCCVyVrgAVqCC8SVBM16niB7aPAvAvzVxW9'
            ],
        ];
    }
}
