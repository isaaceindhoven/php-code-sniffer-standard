# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Updated
- Code now adheres own codestyle
- Included phpstan

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
