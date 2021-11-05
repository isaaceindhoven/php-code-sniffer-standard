<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Standards\ISAAC\Sniffs\Namespaces;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\TokenHelper;
use SlevomatCodingStandard\Helpers\UseStatementHelper;

use const T_SEMICOLON;
use const T_USE;

class MultipleLinesPerUseSniff implements Sniff
{
    public const CODE_MULTIPLE_LINES_PER_USE = 'MultipleLinesPerUse';
    public const ERROR_MESSAGE = 'Use statement "%s" should be placed on a single line.';

    /**
     * @return array<int>
     */
    public function register(): array
    {
        return [T_USE];
    }

    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $usePointer)
    {
        if (UseStatementHelper::isAnonymousFunctionUse($phpcsFile, $usePointer)) {
            return;
        }

        $tokens = $phpcsFile->getTokens();

        $semicolonPointer = TokenHelper::findNext($phpcsFile, T_SEMICOLON, $usePointer);
        $fqn = UseStatementHelper::getFullyQualifiedTypeNameFromUse($phpcsFile, $usePointer);

        if ($tokens[$usePointer]['line'] === $tokens[$semicolonPointer]['line']) {
            return;
        }

        $phpcsFile->addError(
            self::ERROR_MESSAGE,
            $usePointer,
            self::CODE_MULTIPLE_LINES_PER_USE,
            [$fqn]
        );
    }
}
