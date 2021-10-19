UPGRADE FROM 23.0 to 24.0
=========================

Version 24 adds a new sniff that requires a nullable type delcaration (added in PHP 7.1) for parameters with a default
value of `null`.

To upgrade `isaac/php-code-sniffer-standard` in your project, the following steps are required.

Install version 24.0
---------------------
```shell
composer require --dev --update-with-dependencies isaac/php-code-sniffer-standard ^24.0
```

Get rid of new violations
-------------------------

After the upgrade, PHP_CodeSniffer may report new violations. You can automatically resolve these with the help of
`phpcbf`:

```shell
vendor/bin/phpcbf --sniffs=SlevomatCodingStandard.TypeHints.DisallowArrayTypeHintSyntax
```
