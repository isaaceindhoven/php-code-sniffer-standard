UPGRADE FROM 27.0 to 28.0
=========================

Version 28 introduces new checks that are not automatically fixable.

To upgrade `isaac/php-code-sniffer-standard` in your project, the following steps are required.

Install version 28.0
---------------------
```shell
composer require --dev --update-with-dependencies isaac/php-code-sniffer-standard ^28.0
```

Get rid of new violations
-------------------------

After the upgrade, PHP_CodeSniffer may report new violations. There are two ways to deal with these violations: fix them
or ignore them. Because these new checks mostly focus on security, it is recommended to fix each violation. Simply go
through the list of new violations reported and fix them.

There may be cases in which it is preferable to not fix the new violations. In such a case, add `// phpcs:ignore`
instructions above each violation or let the PHP_CodeSniffer Baseliner automatically add these instructions:

```shell
composer global require isaac/php-code-sniffer-baseliner
vendor/bin/phpcs-baseliner create-baseline
```
