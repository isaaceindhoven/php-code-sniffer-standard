<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests\Standards\ISAAC\Sniffs\ControlStructures;

use IsaacCodingStandard\Standards\ISAAC\Sniffs\ControlStructures\DisallowGotoOperatorSniff;
use IsaacCodingStandard\Tests\BaseTestCase;
use PHP_CodeSniffer\Exceptions\DeepExitException;

use function sprintf;

class DisallowGotoOperatorSniffTest extends BaseTestCase
{
    /**
     * @return void
     * @throws DeepExitException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->codeSnifferRunner
            ->setSniff('ISAAC.ControlStructures.DisallowGotoOperator')
            ->setFolder(sprintf('%s/Assets/', __DIR__));
    }

    /**
     * @return void
     * @throws DeepExitException
     */
    public function testSniff(): void
    {
        $results = $this->codeSnifferRunner->sniff('DisallowGotoOperatorSniff.inc');

        self::assertSame(1, $results->getErrorCount());
        self::assertSame(0, $results->getWarningCount());

        $errorMessages = $results->getAllErrorMessages();
        self::assertCount(1, $errorMessages);

        foreach ($errorMessages as $errorMessage) {
            self::assertEquals(DisallowGotoOperatorSniff::ERROR_MESSAGE, $errorMessage);
        }
    }
}
