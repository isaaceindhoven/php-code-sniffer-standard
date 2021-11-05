<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Standards\ISAAC\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

use const T_COALESCE;

class DisallowNullCoalesceOperatorSniff implements Sniff
{
    public const CODE_DISALLOW_NULL_COALESCE_OPERATOR = 'DisallowNullCoalesceOperator';
    public const ERROR_MESSAGE = 'Use of null coalesce operator is disallowed.';

    /**
     * @return array<int>
     */
    public function register(): array
    {
        return [
            T_COALESCE,
        ];
    }

    /**
     * @param File $phpcsFile
     * @param int $stackPtr
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['code'] === T_COALESCE && $tokens[$stackPtr]['content'] === '??') {
            $phpcsFile->addError(self::ERROR_MESSAGE, $stackPtr, self::CODE_DISALLOW_NULL_COALESCE_OPERATOR);
        }
    }
}
