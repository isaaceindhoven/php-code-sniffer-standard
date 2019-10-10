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
composer require --dev isaac/php-code-sniffer
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

#### PHPCompatibility

To get the most out of the PHPCompatibility standard, you should specify a testVersion to check against.
That will enable the checks for both deprecated/removed PHP features as well as the detection of code using new PHP features.
Include the testVersion by adding a config rule in your `phpcs.xml`. Examples:

```
    <config name="testVersion" value="7.0"/> <!-- check for compatability with php 7.0 -->
    <config name="testVersion" value="7.1-"/> <!-- check for 7.1 and higher -->
    <config name="testVersion" value="7.0-7.2"/> <!-- check within range 7.0 to 7.2 -->
```

Look here for more information: https://github.com/PHPCompatibility/PHPCompatibility#using-a-custom-ruleset

### Usage

Since you now have a `phpcs.xml` file in the root of your project, you can run the default phpcs-command: `vendor/bin/phpcs`.

### Contributing

If you want to to contribute, create a merge request with **one sniff per merge request**. Please provide
an example in the description of what the sniff is about with a good and bad code snippet.
