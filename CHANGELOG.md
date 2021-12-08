# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [26.0.0] - 2022-04-19
### Added
- Add `SlevomatCodingStandard.Variables.UnusedVariable` rule
- Add the `Generic.PHP.BacktickOperator` rule
- Add `ISAAC.ControlStructures.DisallowGotoOperator` rule

### Changed
- Disallow all superglobals by replacing the `MySource.PHP.GetRequestData` rule by the more complete `SlevomatCodingStandard.Variables.DisallowSuperGlobalVariable` rule
- Change the `Generic.PHP.ForbiddenFunctions` array value into a more readable and expandable form

### Removed
- Remove explicit inclusion of the `PSR12.Operators.OperatorSpacing` rule
- Remove explicit inclusion of the `Generic.Files.LineEndings` rule
- Remove explicit inclusion of the `Squiz.WhiteSpace.SuperfluousWhitespace` rule

## [25.1.0] - 2021-12-08
### Removed
- Remove the `Generic.CodeAnalysis.UselessOverridingMethod` rule

## [25.0.0] - 2021-11-05
### Added
- Add GitHub Action
- Add support for PHP 8.1

### Changed
- Upgrade PHPStan to version 1
- Upgrade PHPUnit to version 9

### Removed
- Remove support for PHP 7.2

### Fixed
- Adhere to own coding standard and update PHP_CodeSniffer configuration to the latest standards

## [24.0.0] - 2021-10-19
### Added
- Add sniff to require nullable type for parameters with a default null value.
`SlevomatCodingStandard.TypeHints.NullableTypeForNullDefaultValue`

## [23.0.0] - 2021-08-04
### Added
- Add sniff to disallow square bracket style (`...[]`) array type hint in favor of the angular bracket style (`array<...>`).

## [22.0.0] - 2021-06-17
### Changed
- Replace the deprecated `ObjectCalisthenics.Files.FunctionLength` rule by `SlevomatCodingStandard.Functions.FunctionLength`
- Replace the deprecated `ObjectCalisthenics.Metrics.MaxNestingLevel` rule by `Generic.Metrics.NestingLevel`
- Replace the deprecated `ObjectCalisthenics.Metrics.PropertyPerClassLimit` rule by `ISAAC.Classes.PropertyPerClassLimit`
- Replace the deprecated `ObjectCalisthenics.Metrics.MethodPerClassLimit` rule by `ISAAC.Classes.MethodPerClassLimit`
- Update slevomat/coding-standard from v6 to v7
- Update squizlabs/php_codesniffer from v3.5 to v3.6

### Fixed
- Fixed the test runner by only executing the tested sniff
- Fixed 'constant not found' PHPStan errors
- Resolve phpcs sniff violations in test classes when running phpcs using PHP 7.4 or 8.0
- Resolve phpcs sniff violations in BaseTestCase class
- Add .phpunit.result.cache to the .gitignore
- Resolve phpunit error when using the --filter option

### Removed
- Removed object-calisthenics/phpcs-calisthenics-rules
- Removed explicit reference to ISAAC rules (the rules added by this packages are included automatically)

## [21.0.0] - 2021-03-09
### Removed
- Removed duplicate class constant visibility check (removed  SlevomatCodingStandard.Classes.ClassConstantVisibility in favor of PSR12.Properties.ConstantVisibility which is part of the PSR12 ruleset)

### Added
- Add sniff to only allow linux line endings.

## [20.0.0] - 2021-01-09
### Added
- Add sniff to disallow spaces surrounding an object operator.
- Add PHP 8.0 support

## [19.0.0] - 2020-10-30
### Added
- Added LICENSE.md

### Changed
- Changed license to MIT
- Removed ISAAC company-specific instructions from README

## [18.2.0] - 2020-10-13
### Changed
- Update dealerdirect/phpcodesniffer-composer-installer to ^0.7

## [18.1.0] - 2020-08-11
### Changed
- Mark the tests directory and the .gitattributes and .gitignore files as export-ignore

## [18.0.0] - 2020-08-11
### Added
- Add sniff to require native property type declarations if possible.

## [17.0.1] - 2020-05-19
### Fixed
- Use 'conflict' instead of 'replace'. Otherwise, when switching branches after installing the new version, running
  composer install will not install the old version of the package again.

## [17.0.0] - 2020-05-18
### Added
- Add sniff to require use statements to be placed on a single line.

### Changed
- Rename 'ISAAC PHP_CodeSniffer' to 'ISAAC PHP_CodeSniffer Standard'
- Downgrade PHPUnit from ^9.1 to ^8.5 to allow package development with PHP 7.2

## [16.0.0] - 2020-04-09
### Added
- Add instructions on ignoring sniff violations

### Changed
- Allow imports to exceed the line length limit
- Disallow group use declarations
- Update PHPUnit dev-dependency to version 9.1

## [15.1.0] - 2020-03-04
### Changed
- Update dealerdirect/phpcodesniffer-composer-installer to version 0.6

## [15.0.1] - 2020-03-04
### Fixed
- Fix typo in changelog of version 14.0.0: 'Drop support for PHP 7.2' should be 'Drop support for PHP 7.1'
- Explicitly state the supported minor PHP-versions in composer.json
- Fix autoload-dev (this caused problems while running the tests)
- Configure the supported PHP versions of this package in phpcs.xml

### Changed
- Update PHPStan (dev-requirement of this package)

## [15.0.0] - 2020-01-14
### Added
- PHPCompatibility
- Sniff to disallow spaces when passing variables as reference

## [14.0.1] - 2019-12-18
### Fixed
- Fixed wrongly typed sniff names

## [14.0.0] - 2019-12-18
### Changed
- Update slevomat/coding-standard to version 6

### Removed
- Drop support for PHP 7.1

## [13.0.2] - 2019-11-15
### Added
- Included phpstan

### Fixed
- Code now adheres own codestyle

## [13.0.1] - 2019-11-13
## Fixed
- Add squizlabs/php_codesniffer and sebastian/recursion-context as root dependencies in composer.json

## [13.0.0] - 2019-11-12
### Added
- Sniff to disallow multiple statement alignment

## Fixed
- Fix code to adhere to the coding standard

## [12.0.0] - 2019-09-10
### Added
- PSR-12 ruleset

### Removed
- PSR-2 ruleset

## [11.0.0] - 2019-08-14
### Added
- Sniff to require trailing commas in multi-line arrays
- Sniff to require a closure to be static when it does not use `$this`

## [10.0.0] - 2019-07-05
### Added
- Sniff to disallow use of double quotes when it is not required

## [9.0.0] - 2019-04-09
### Updated
- Require importing global functions and constants

## [8.0.0] - 2019-03-25
### Added
- Sniff to require exactly one space after casting expression.

### Updated
- slevomat/coding-standard from ^4.6 to ^5.0
- object-calisthenics/phpcs-calisthenics-rules from ^3.4 to ^3.5

### Removed
- object-calisthenics/phpcs-calisthenics-rules from dev-dependencies

## [7.0.1] - 2019-02-14
- Tagged new version because the v7.0.0 was placed on the develop branch instead of the master branch.

## [7.0.0] - 2019-02-13
### Added
- Sniff to check return type hint whitespace
- Sniff to check for useless constant type hints
- Sniff to check spacing around functions
- Sniff to enforce camel caps for (member) variables
- Sniff to check operator spacing
- Sniff to disallow is_null()
- Sniff to disallow blank lines at the begin and end of classes, interfaces and traits
- Sniff to disallow whitespace on blank lines

## [6.0.0] - 2019-01-08
### Added
- Sniff to check for unused private elements
- Sniff to check alphabetically sorted uses
- Sniff to disallow long array syntax
- Sniff for object calisthenics: maxFunctionLength of 25 lines

## [5.0.0] - 2018-12-19
### Added
- Sniff to detect incorrect PHP syntax
-  (focus on maintainability, readability, testability and comprehensibility):
    - number of methods per class
    - number of properties per class
    - cyclomatic complexity
    - max nesting level

### Updated
- dealerdirect/phpcodesniffer-composer-installer to 0.5.0+

## [4.0.0] - 2018-11-14
### Added
- Sniff to disallow empty()
- Sniff to disallow isset()
- Sniff to disallow null coalesce operator
- Created the ISAAC ruleset to be included, instead of extending the phpcs.xml file

## [3.0.0] - 2018-10-09
### Added
- Sniff to disallow loose equal operator (`===` over `==`)
- Sniff to disallow yoda comparison (`if (true === something()))`)
- Sniff to enforce typecasting with short notations (`(int)` over`(integer)`, `(bool)` over `(boolean)`, etc.)
- Sniff to enforce strict type declaration
- Sniff to enforce nicely indented arrays

## [2.0.0] - 2018-09-10
### Added
- [PHP_CodeSniffer Standards Composer Installer Plugin](https://github.com/DealerDirect/phpcodesniffer-composer-installer):
The package depends on codesniffer and automatically configures its installed_paths config setting. We no longer have to overwrite that setting in order to get our ruleset to work.
This enables additional rulesets to be defined on the project level without needing to think about when to set the installed_paths key.

## [1.0.1] - 2018-08-22
### Added
- Added changelog

## 1.0.0 - 2018-08-21
### Initial commit
