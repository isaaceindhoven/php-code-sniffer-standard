<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Standards\ISAAC\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\FunctionHelper;
use SlevomatCodingStandard\Helpers\SniffSettingsHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;

use function count;
use function sprintf;

use const T_ANON_CLASS;
use const T_CLASS;
use const T_FUNCTION;
use const T_INTERFACE;
use const T_TRAIT;

class MethodPerClassLimitSniff implements Sniff
{
    public const CODE_METHOD_PER_CLASS_LIMIT = 'MethodPerClassLimit';

    public const ERROR_MESSAGE = '%s has too many methods: %d. Can be up to %d methods.';

    /** @var int */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    public $maxMethodCount = 10;

    /**
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [T_CLASS, T_ANON_CLASS, T_TRAIT, T_INTERFACE];
    }

    /**
     * @param File $phpcsFile
     * @param int $classPointer
     */
    public function process(File $phpcsFile, $classPointer): void
    {
        $maxMethodCount = SniffSettingsHelper::normalizeInteger($this->maxMethodCount);
        $numberOfMethods = count($this->getMethodPointers($phpcsFile, $classPointer));
        if ($numberOfMethods <= $maxMethodCount) {
            return;
        }
        $errorMessage = sprintf(
            self::ERROR_MESSAGE,
            $phpcsFile->getTokens()[$classPointer]['content'],
            $numberOfMethods,
            $maxMethodCount
        );
        $phpcsFile->addError($errorMessage, $classPointer, self::CODE_METHOD_PER_CLASS_LIMIT);
    }

    /**
     * @param File $phpcsFile
     * @param int $classPointer
     * @return int[]
     */
    protected function getMethodPointers(File $phpcsFile, int $classPointer): array
    {
        $classToken = $phpcsFile->getTokens()[$classPointer];
        $scopeOpenerPointer = $classToken['scope_opener'];
        $scopeCloserPointer = $classToken['scope_closer'];
        $methodPointers = [];
        $functionPointers =
            TokenHelper::findNextAll($phpcsFile, T_FUNCTION, $scopeOpenerPointer + 1, $scopeCloserPointer);
        foreach ($functionPointers as $functionPointer) {
            if (!FunctionHelper::isMethod($phpcsFile, $functionPointer)) {
                continue;
            }
            if (FunctionHelper::findClassPointer($phpcsFile, $functionPointer) !== $classPointer) {
                continue;
            }
            $methodPointers[] = $functionPointer;
        }
        return $methodPointers;
    }
}
