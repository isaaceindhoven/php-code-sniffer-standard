<?php

declare(strict_types=1);

namespace MethodPerClassLimitGood;

interface MaximumAmountOfMethods
{
    public function method1(): void;

    public function method2(): bool;

    public function method3(): int;

    public function method4(): float;

    public function method5(): string;

    /** @return int[] */
    public function method6(): array;

    /** @return null */
    public function method7();

    /** @return object */
    public function method8();

    public function method9(): void;

    /**
     * @param mixed $x
     * @return mixed
     */
    function method10($x);
}
