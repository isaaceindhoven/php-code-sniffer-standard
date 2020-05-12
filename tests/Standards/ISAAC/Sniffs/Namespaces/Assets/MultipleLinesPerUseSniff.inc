<?php

declare(strict_types=1);

use DateTime
    as DT;
use Exception as E;

new DT();
new E();

// verify that non-import use statements using multiple lines are allowed
$foo = 'foo';
$anonymousFunction = static function () use (
    $foo
) {
    echo $foo;
};
