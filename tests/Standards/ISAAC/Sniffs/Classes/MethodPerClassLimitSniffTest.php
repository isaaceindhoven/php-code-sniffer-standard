<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests\Standards\ISAAC\Sniffs\Classes;

use IsaacCodingStandard\Standards\ISAAC\Sniffs\Classes\MethodPerClassLimitSniff;
use IsaacCodingStandard\Tests\BaseTestCase;
use PHP_CodeSniffer\Exceptions\DeepExitException;

use function sprintf;

class MethodPerClassLimitSniffTest extends BaseTestCase
{
    /**
     * @return void
     * @throws DeepExitException
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->codeSnifferRunner
            ->setSniff('ISAAC.Classes.MethodPerClassLimit')
            ->setFolder(sprintf('%s/Assets/', __DIR__));
    }

    /** @dataProvider goodDataProvider */
    public function testGood(string $fileName): void
    {
        $results = $this->codeSnifferRunner->sniff($fileName);
        $errorCount = $results->getErrorCount();
        self::assertSame(0, $errorCount, sprintf('expected no errors, got %d errors', $errorCount));
    }

    /** @dataProvider badDataProvider */
    public function testBad(string $fileName, string $tokenName): void
    {
        $results = $this->codeSnifferRunner->sniff($fileName);
        $errorCount = $results->getErrorCount();
        self::assertSame(1, $errorCount, sprintf('expected 1 error, got %d errors', $errorCount));
        foreach ($results->getAllErrorMessages() as $errorMessage) {
            self::assertEquals(
                sprintf(MethodPerClassLimitSniff::ERROR_MESSAGE, $tokenName, 11, 10),
                $errorMessage
            );
        }
    }

    /** @return array<array<mixed>> */
    public function goodDataProvider(): array
    {
        return [
            ['MethodPerClassLimitGood.inc', ],
            ['MethodPerAnonymousClassLimitGood.inc', ],
            ['MethodPerTraitLimitGood.inc', ],
            ['MethodPerInterfaceLimitGood.inc', ],
        ];
    }

    /** @return array<array<mixed>> */
    public function badDataProvider(): array
    {
        return [
            ['MethodPerClassLimitBad.inc', 'class', ],
            ['MethodPerAnonymousClassLimitBad.inc', 'class', ],
            ['MethodPerTraitLimitBad.inc', 'trait', ],
            ['MethodPerInterfaceLimitBad.inc', 'interface', ],
        ];
    }
}
