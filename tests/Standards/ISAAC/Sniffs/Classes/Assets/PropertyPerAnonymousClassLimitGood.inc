<?php

declare(strict_types=1);

namespace PropertyPerAnonymousClassLimitGood;

$maximumAmountOfProperties = new class {
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

    /** @return object */
    protected function anonymousClassMethod()
    {
        return new class {
            /** @var mixed */
            protected $anonymousProperty1;
        };
    }
};

$anotherAnonymousClass = new class {
    /** @var mixed */
    protected $aProperty;
};
