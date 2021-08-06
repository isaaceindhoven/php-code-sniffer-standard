UPGRADE FROM 22.0 to 23.0
=========================

Version 23 adds a new sniff that disallows square bracket style (`...[]`) array type hint in favor of the angle
bracket style (`array<...>`).

To upgrade `isaac/php-code-sniffer-standard` in your project, the following steps are required.

Install version 23.0
---------------------
```shell
composer require --dev --update-with-dependencies isaac/php-code-sniffer-standard ^23.0
```

Get rid of new violations
-------------------------

After the upgrade, PHP_CodeSniffer will probably report many new violations because of square bracket style array type
hints. You can either resolve these with the help of `phpcbf` or ignore these by adding `phpcs:ignore` instructions.

### Option 1: resolve array type hint style violations

You can change all square bracket style array type hints to angle bracket style array type hints automatically with
`phpcbf`:

```shell
vendor/bin/phpcbf --sniffs=SlevomatCodingStandard.TypeHints.DisallowArrayTypeHintSyntax
```

This does also modify union type hints containing `iterable` and an array type hint (e.g. `iterable|string[]`) to a
single iterable type hint with angle brackets (e.g. `iterable<string>`). However, it does not do this for other
traversable type hints, like `Generator|string[]`. It will change those to `Generator|array<string>`.

When using other static analyzers like PHPStan, this may result in new errors. PHPStan treats a type hint like
`Generator|string[]` not the same as `Generator|array<string>` and will probably report an error that `Generator` and
`array` types cannot be used together. So if you use square bracket array type hints to indicate the generic type of
traversables (other than `iterable`), you have to manually fix these. 

### Option 2: ignore existing array type hint style violations

If resolving the violations results in too many issues with other statical analyzers and therefore is too
time-consuming, you may instead want to ignore all existing array type hint style violations automatically using the
[PHP_CodeSniffer Baseliner](https://github.com/isaaceindhoven/php-code-sniffer-baseliner):

```shell
composer global require isaac/php-code-sniffer-baseliner
vendor/bin/phpcs-baseliner create-baseline
```

This adds `phpcs:ignore` (or `phpcs:disable`/`phpcs:enable`) instructions above (or around) square bracket style array
type hint.
