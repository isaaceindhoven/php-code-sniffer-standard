<?php

declare(strict_types=1);

// disallowed
$foo = $bar ?? $moo;

// allowed
$allowedInString = 'using ?? within a string is allowed';
