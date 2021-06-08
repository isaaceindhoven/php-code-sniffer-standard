<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Exceptions\DeepExitException;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    /** @var CodeSnifferRunner $codeSnifferRunner */
    protected $codeSnifferRunner;

    /**
     * @return void
     * @throws DeepExitException
     */
    public function setUp(): void
    {
        parent::setUp();
        if (defined('PHP_CODESNIFFER_CBF') === false) {
            define('PHP_CODESNIFFER_CBF', false);
        }
        $this->codeSnifferRunner = new CodeSnifferRunner();
    }
}
