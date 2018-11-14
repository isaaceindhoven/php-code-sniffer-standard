ISAAC PHPCS
===========

Extending the default [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) with ISAAC rules

**Note**: Adding new phpcs-rules to this package must result in a major version update!

### Installation

First, add the path of this repo to the composer file in your project:

```
composer config repositories.isaac-php-code-sniffer vcs git@gitlab.isaac.local:php-module/isaac-php-code-sniffer.git
```

Now require the package:

```
composer require --dev "isaac/php-code-sniffer:^2.0"
```

### Setup
Create a `phpcs.xml`-file in the root of your project, and include the default ISAAC ruleset:

```
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="phpcs-isaac">
    <!-- include root folder of project -->
    <file>.</file>
    <!-- exclude paths -->
    <exclude-pattern>./src/Migrations</exclude-pattern>
    <exclude-pattern>./vendor</exclude-pattern>

    <!-- include all rules in isaac ruleset -->
    <rule ref="ISAAC"/>
</ruleset>
```

Change the name of the ruleset, modify the excluded paths and/or include custom rulesets for your project.

### Usage

Since you now have a `phpcs.xml` file in the root of your project, you can run the default phpcs-command: `vendor/bin/phpcs`.

### Contributing

If you want to to contribute, create a merge request with **one sniff per merge request**. Please provide
an example in the description of what the sniff is about with a good and bad code snippet.
