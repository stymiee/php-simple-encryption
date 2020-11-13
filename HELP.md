# Help
Here are some tips, solutions to common problems, and guides for testing.

## Tips

### Use default settings
One of the goals of PHP Simple Encryption is to ensure that best practices are followed when using cryptography. By 
default, this library uses a secure crypto cipher and initialization vector generation algorithm. If you use this 
library with the default settings you will be secure *by default*. (This does not include how you store and transmit 
that data, of course).

## Common Errors

### Call to undefined method Encryption\Cipher\[cipher-family]\[cipher-name]::generateIv()
### [cipher-name] does not require an initialization vector (IV). Do not call Encryption::generateIv().

This error occurs when trying to generate an initialization vector for a cipher that does not require one. Simply do not
use this line of code: `$iv = $encryption->generateIv();`.

## Asking for help on Stack Overflow
Be sure when you [ask a question](http://stackoverflow.com/questions/ask?tags=php,encryption,openssl) pertaining to the 
usage of this library be sure to tag your question with the **PHP** and **encryption** tags. Make sure you follow their
[guide for asking a good question](http://stackoverflow.com/help/how-to-ask) as poorly asked questions will be closed, 
and I will not be able to assist you.

A good question will include all the following:
- A description of the problem (what are you trying to do? what results are you expecting? what results are you actually getting?)
- The code you are using (only post the relevant code)
- Your unencrypted text
- The key you are using
- The IV you are using (if applicable)
- The output of your method call(s)
- Any error message(s) you are getting

**Do not use Stack Overflow to report bugs.** Bugs may be reported [here](https://github.com/stymiee/php-simple-encryption/issues/new).

## Helpful Links
- [Tutorial: PHP Simple Encryption](https://www.johnconde.net/blog/php-simple-encryption/)
- [PHP Openssl](https://www.php.net/manual/en/book.openssl.php)
