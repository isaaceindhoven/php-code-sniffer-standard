<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Standards\ISAAC\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

use const T_GOTO;

class DisallowGotoOperatorSniff implements Sniff
{
    public const ERROR_CODE = 'Found';

    public const ERROR_MESSAGE = 'Use of the goto operator is disallowed.';

    /**
     * @return array<int>
     */
    public function register(): array
    {
        return [
            T_GOTO,
        ];
    }

    /**
     * @param File $phpcsFile
     * @param int $stackPtr
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $phpcsFile->addError(self::ERROR_MESSAGE, $stackPtr, self::ERROR_CODE);
    }
}
