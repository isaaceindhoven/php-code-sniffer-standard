<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests\Standards\ISAAC\Sniffs\Namespaces;

use DateTime;
use IsaacCodingStandard\Standards\ISAAC\Sniffs\Namespaces\MultipleLinesPerUseSniff;
use IsaacCodingStandard\Tests\BaseTestCase;
use PHP_CodeSniffer\Exceptions\DeepExitException;

use function implode;
use function sprintf;

class MultipleLinesPerUseSniffTest extends BaseTestCase
{
    /**
     * @return void
     * @throws DeepExitException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->codeSnifferRunner
            ->setSniff('ISAAC.Namespaces.MultipleLinesPerUseSniff')
            ->setFolder(sprintf('%s/Assets/', __DIR__));
    }

    /**
     * @return void
     * @throws DeepExitException
     */
    public function testSniff(): void
    {
        $results = $this->codeSnifferRunner->sniff('MultipleLinesPerUseSniff.inc');

        self::assertSame(1, $results->getErrorCount(), implode("\n", $results->getAllErrorMessages()));
        self::assertSame(0, $results->getWarningCount());

        $errorMessages = $results->getAllErrorMessages();
        self::assertCount(1, $errorMessages);

        foreach ($errorMessages as $errorMessage) {
            self::assertEquals(sprintf(MultipleLinesPerUseSniff::ERROR_MESSAGE, DateTime::class), $errorMessage);
        }
    }
}
