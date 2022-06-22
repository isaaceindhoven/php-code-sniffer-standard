UPGRADE FROM 26.0 to 27.0
=========================

Version 27 adds a new sniff that disallows the use of `get_class()` in favor of `::class` when possible.

To upgrade `isaac/php-code-sniffer-standard` in your project, the following steps are required.

Install version 27.0
---------------------
```shell
composer require --dev --update-with-dependencies isaac/php-code-sniffer-standard ^27.0
```

Get rid of new violations
-------------------------

After the upgrade, PHP_CodeSniffer may report new violations. You can automatically resolve these with the help of
`phpcbf`:

```shell
vendor/bin/phpcbf --sniffs=SlevomatCodingStandard.Classes.ModernClassNameReference
```
