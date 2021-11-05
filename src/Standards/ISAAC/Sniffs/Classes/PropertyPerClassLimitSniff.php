<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Standards\ISAAC\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\PropertyHelper;
use SlevomatCodingStandard\Helpers\ScopeHelper;
use SlevomatCodingStandard\Helpers\SniffSettingsHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;

use function count;
use function sprintf;

use const T_ANON_CLASS;
use const T_CLASS;
use const T_TRAIT;
use const T_VARIABLE;

class PropertyPerClassLimitSniff implements Sniff
{
    public const CODE_PROPERTY_PER_CLASS_LIMIT = 'PropertyPerClassLimit';

    public const ERROR_MESSAGE = '%s has too many properties: %d. Can be up to %d properties.';

    /** @var int */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    public $maxPropertyCount = 10;

    /**
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [T_CLASS, T_TRAIT, T_ANON_CLASS];
    }

    /**
     * @param File $phpcsFile
     * @param int $classPointer
     */
    public function process(File $phpcsFile, $classPointer): void
    {
        $maxPropertyCount = SniffSettingsHelper::normalizeInteger($this->maxPropertyCount);
        $numberOfProperties = count($this->getPropertyPointers($phpcsFile, $classPointer));
        if ($numberOfProperties <= $maxPropertyCount) {
            return;
        }
        $errorMessage = sprintf(
            self::ERROR_MESSAGE,
            $phpcsFile->getTokens()[$classPointer]['content'],
            $numberOfProperties,
            $maxPropertyCount
        );
        $phpcsFile->addError($errorMessage, $classPointer, self::CODE_PROPERTY_PER_CLASS_LIMIT);
    }

    /**
     * @param File $phpcsFile
     * @param int $classPointer
     * @return array<int>
     */
    protected function getPropertyPointers(File $phpcsFile, int $classPointer): array
    {
        $classToken = $phpcsFile->getTokens()[$classPointer];
        $scopeOpenerPointer = $classToken['scope_opener'];
        $scopeCloserPointer = $classToken['scope_closer'];
        $propertyPointers = [];
        $variablePointers =
            TokenHelper::findNextAll($phpcsFile, T_VARIABLE, $scopeOpenerPointer + 1, $scopeCloserPointer);
        foreach ($variablePointers as $variablePointer) {
            if (!PropertyHelper::isProperty($phpcsFile, $variablePointer)) {
                continue;
            }
            if (!ScopeHelper::isInSameScope($phpcsFile, $classPointer, $variablePointer)) {
                continue;
            }
            $propertyPointers[] = $variablePointer;
        }
        return $propertyPointers;
    }
}
