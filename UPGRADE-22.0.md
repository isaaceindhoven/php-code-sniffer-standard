UPGRADE FROM 21.0 to 22.0
=========================

Most important changes:
- Abandoned Composer dependency `object-calisthenics/phpcs-calisthenics-rules` is removed and the sniffs from that package
  are replaced by other existing sniffs and new self-written sniffs.
- Composer dependency `slevomat/coding-standard` is upgraded from version 6 to version 7.
See [CHANGELOG.md](CHANGELOG.md#2200---2021-06-17) for a complete list of changes.

To upgrade `isaac/php-code-sniffer-standard` in your project, the following steps are required.

Install version 22.0:
```shell
composer require --dev --update-with-dependencies isaac/php-code-sniffer-standard ^22.0
```

Your code or configuration may contain references to the ObjectCalisthenics sniffs (like in `phpcs:ignore` instructions)
that are replaced by other sniffs. Change these references to the new sniffs names by doing a find-and-replace using the
these terms:

| Find                                                                                                            | Replace                                                          |
|-----------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------|
| `ObjectCalisthenics.Files.FunctionLength.ObjectCalisthenics\Sniffs\Files\FunctionLengthSniff`                   | `SlevomatCodingStandard.Functions.FunctionLength.FunctionLength` |
| `ObjectCalisthenics.Metrics.MaxNestingLevel.ObjectCalisthenics\Sniffs\Metrics\MaxNestingLevelSniff`             | `Generic.Metrics.NestingLevel.MaxExceeded`                       |
| `ObjectCalisthenics.Metrics.PropertyPerClassLimit.ObjectCalisthenics\Sniffs\Metrics\PropertyPerClassLimitSniff` | `ISAAC.Classes.PropertyPerClassLimit.PropertyPerClassLimit`      |
| `ObjectCalisthenics.Metrics.MethodPerClassLimit.ObjectCalisthenics\Sniffs\Metrics\MethodPerClassLimitSniff`     | `ISAAC.Classes.MethodPerClassLimit.MethodPerClassLimit`          |

It could be that PHP_CodeSniffer still reports new violations compared to before. This can have several reasons. The new
maximum nesting level sniff is somewhat stricter than the old one: the new one also takes into account anonymous
functions (closures), while the old one did not. Also, small changes caused by the major dependency update of
`slevomat/coding-standard` may introduce new violations.

You can either resolve these violations manually, or let the PHP_CodeSniffer Baseliner automatically add `phpcs:ignore`
instructions:

```shell
composer global require isaac/php-code-sniffer-baseliner
vendor/bin/phpcs-baseliner create-baseline
```
