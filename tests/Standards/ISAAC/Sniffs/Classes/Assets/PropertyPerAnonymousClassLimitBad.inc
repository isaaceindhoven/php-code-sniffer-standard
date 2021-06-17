<?php

declare(strict_types=1);

namespace PropertyPerAnonymousClassLimitBad;

$tooManyProperties = new class {
    /** @var mixed */
    protected $property1;

    /** @var mixed */
    protected $property2;

    /** @var mixed */
    protected $property3;

    /** @var mixed */
    protected $property4;

    /** @var mixed */
    protected $property5;

    /** @var mixed */
    protected $property6;

    /** @var mixed */
    protected $property7;

    /** @var mixed */
    protected $property8;

    /** @var mixed */
    protected $property9;

    /** @var mixed */
    protected $property10;

    /** @var mixed */
    protected $property11;
};
