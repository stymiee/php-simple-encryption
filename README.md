# PHP Simple Encryption (php-simple-encryption)

## Requirements

- PHP 7.4+
- Openssl PHP extension

## Installation

Simply add a dependency on `stymiee/php-simple-encryption` to your project's `composer.json` file if you 
use [Composer](http://getcomposer.org/) to manage the dependencies of your project.

Here is a minimal example of a `composer.json` file that just defines a dependency on PHP Simple Encryption:

    {
        "require": {
            "stymiee/php-simple-encryption": "stable"
        }
    }

## Basic Usage

    use JohnConde\Encryption\Encryption;
    
    require('../vendor/autoload.php');
    
    $text = 'The quick brown fox jumps over the lazy dog';
    $key  = 'secretkey';
    
    $encryption = Encryption::getEncryptionObject();
    $iv = $encryption->generateIv();
    $encryptedText = $encryption->encrypt($text, $key, $iv);
    $decryptedText = $encryption->decrypt($encryptedText, $key, $iv);
    
    printf('Cipher   : %s%s', $encryption->getName(), PHP_EOL);
    printf('Encrypted: %s%s', $encryptedText, PHP_EOL);
    printf('Decrypted: %s%s', $decryptedText, PHP_EOL);
    
Outputs

    Cipher   : AES-256-CBC
    Encrypted: lierDqV4Qo3Cm87YU01K+YnQsDGrFsYypjHJVZaagqfLFg7xb2T7b9qfqb4NcoIGcTzqvQbOx72AVgbuRFxqgg==
    Decrypted: The quick brown fox jumps over the lazy dog

## Supported Ciphers

The PHP Simple Encryption library currently defaults to `AES-256-CBC`. This may change in future versions and will 
result in a major version bump when this occurs.
 
To determine what cipher you are using you can call the `getName()` method on your encryption object.

    $encryption = Encryption::getEncryptionObject();
    $cipherName = $encryptuion->getName(); // AES-256-CBC
    
To get a list of ciphers supported by your system *and* this library you can call `Encryption::listAvailableCiphers()`
to receive an array of available ciphers. This list is an intersection of available ciphers from your system's
installed version of Openssl and ciphers supported by this library.    

**Total ciphers supported:** 127    
**Default cipher:** AES-256-CBC

|              |               |                   |               |               |
|--------------|---------------|-------------------|---------------|---------------|
| aes-128-cbc  | aria-128-cbc  | camellia-128-cbc  | des-ecb       | sm4-cbc       |
| aes-128-ccm  | aria-128-ccm  | camellia-128-cfb  | des-ede-cbc   | sm4-cfb       |
| aes-128-cfb  | aria-128-cfb  | camellia-128-cfb  | des-ede-cfb   | sm4-ctr       |
| aes-128-cfb1 | aria-128-cfb1 | camellia-128-cfb  | des-ede-ofb   | sm4-ecb       |
| aes-128-cfb8 | aria-128-cfb8 | camellia-128-ctr  | des-ede3-cbc  |               |
| aes-128-ctr  | aria-128-ctr  | camellia-128-ecb  | des-ede3-cfb  |               |
| aes-128-ecb  | aria-128-ecb  | camellia-128-ofb  | des-ede3-cfb1 |               |
| aes-128-gcm  | aria-128-gcm  | camellia-192-cbc  | des-ede3-cfb8 |               |
| aes-128-ofb  | aria-128-ofb  | camellia-192-cfb  | des-ede3-ofb  |               |
| aes-128-xts  | aria-192-cbc  | camellia-192-cfb  | des-ofb       |               |
| aes-192-cbc  | aria-192-ccm  | camellia-192-cfb  | desx-cbc      |               |
| aes-192-ccm  | aria-192-cfb  | camellia-192-ctr  | id-aes128-ccm |               |
| aes-192-cfb  | aria-192-cfb1 | camellia-192-ecb  | id-aes128-gcm |               |
| aes-192-cfb1 | aria-192-cfb8 | camellia-192-ofb  | id-aes192-ccm |               |
| aes-192-cfb8 | aria-192-ctr  | camellia-256-cbc  | id-aes192-gcm |               |
| aes-192-ctr  | aria-192-ecb  | camellia-256-cfb  | id-aes256-ccm |               |
| aes-192-ecb  | aria-192-gcm  | camellia-256-cfb  | id-aes256-gcm |               |
| aes-192-gcm  | aria-192-ofb  | camellia-256-cfb  | idea-cbc      |               |
| aes-192-ofb  | aria-256-cbc  | camellia-256-ctr  | idea-cfb      |               |
| aes-256-cbc  | aria-256-ccm  | camellia-256-ecb  | idea-ecb      |               |
| aes-256-ccm  | aria-256-cfb  | camellia-256-ofb  | idea-ofb      |               |
| aes-256-cfb  | aria-256-cfb1 | cast5-cbc         | rc2-40-cbc    |               |
| aes-256-cfb1 | aria-256-cfb8 | cast5-cfb         | rc2-64-cbc    |               |
| aes-256-cfb8 | aria-256-ctr  | cast5-ecb         | rc2-cbc       |               |
| aes-256-ctr  | aria-256-ecb  | cast5-ofb         | rc2-cfb       |               |
| aes-256-ecb  | aria-256-gcm  | chacha20          | rc2-ecb       |               |
| aes-256-gcm  | aria-256-ofb  | chacha20-poly1305 | rc2-ofb       |               |
| aes-256-ofb  | bf-cbc        | des-cbc           | seed-cbc      |               |
| aes-256-xts  | bf-cfb        | des-cfb           | seed-cfb      |               |
|              | bf-ecb        | des-cfb1          | seed-ecb      |               |
|              | bf-ofb        | des-cfb8          | seed-ofb      |               |


## Notes

If the text to be encrypted contains trailing null characters they will be removed when decrypting those values.

## Support

If you require assistance using this library start by viewing the [HELP.md](HELP.md) file included in this package. It 
includes common problems and their solutions.

If you need additional assistance, I can be found at Stack Overflow. Be sure when you
[ask a question](http://stackoverflow.com/questions/ask?tags=php,encryption,openssl) pertaining to the usage of
this library be sure to tag your question with the **PHP** and **encryption** tags. Make sure you follow their
[guide for asking a good question](http://stackoverflow.com/help/how-to-ask) as poorly asked questions will be closed
and I will not be able to assist you.

**Do not use Stack Overflow to report bugs.** Bugs may be reported [here](https://github.com/stymiee/php-simple-encryption/issues/new).
