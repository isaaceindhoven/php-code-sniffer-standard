<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Exceptions\DeepExitException;
use PHP_CodeSniffer\Exceptions\RuntimeException;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    /** @var CodeSnifferRunner $codeSnifferRunner */
    protected $codeSnifferRunner;

    /**
     * @return void
     * @throws DeepExitException
     * @throws RuntimeException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->codeSnifferRunner = new CodeSnifferRunner();
    }
}
