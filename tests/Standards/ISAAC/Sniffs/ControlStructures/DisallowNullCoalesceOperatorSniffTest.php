<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests\Standards\ISAAC\Sniffs\ControlStructures;

use IsaacCodingStandard\Standards\ISAAC\Sniffs\ControlStructures\DisallowNullCoalesceOperatorSniff;
use IsaacCodingStandard\Tests\BaseTestCase;
use PHP_CodeSniffer\Exceptions\DeepExitException;
use PHP_CodeSniffer\Exceptions\RuntimeException;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class DisallowNullCoalesceOperatorSniffTest extends BaseTestCase
{
    /**
     * @return void
     * @throws DeepExitException
     * @throws RuntimeException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->codeSnifferRunner
            ->setSniff('ISAAC.ControlStructures.DisallowNullCoalesceOperatorSniff')
            ->setFolder(__DIR__ . '/Assets/');
    }

    /**
     * @return void
     * @throws DeepExitException
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testSniff(): void
    {
        $results = $this->codeSnifferRunner->sniff('DisallowNullCoalesceOperatorSniff.inc');

        $this->assertSame(1, $results->getErrorCount());
        $this->assertSame(0, $results->getWarningCount());

        $errorMessages = $results->getAllErrorMessages();
        $this->assertCount(1, $errorMessages);

        foreach ($errorMessages as $errorMessage) {
            $this->assertEquals(DisallowNullCoalesceOperatorSniff::ERROR_MESSAGE, $errorMessage);
        }
    }
}
