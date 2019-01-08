## [6.0.0] - 2019-01-08
### Added
- Sniff to check for unused private elements
- Sniff to check alphabetically sorted uses
- Sniff to disallow long array syntax
- Sniff for object calisthenics: maxFunctionLength of 25 characters

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
