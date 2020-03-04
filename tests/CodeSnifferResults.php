<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Files\File;

use function array_walk_recursive;

class CodeSnifferResults
{
    /** @var File $wrappedClass */
    protected $wrappedClass;

    /**
     * @param File $wrappedClass
     */
    public function __construct(File $wrappedClass)
    {
        $this->wrappedClass = $wrappedClass;
    }

    /**
     * @return mixed[]
     */
    public function getAllErrorMessages(): array
    {
        $allErrorMessages = [];
        $errors = $this->wrappedClass->getErrors();

        array_walk_recursive($errors, static function (&$item, $key) use (&$allErrorMessages): void {
            if ($key === 'message') {
                $allErrorMessages[] = $item;
            }
        });

        return $allErrorMessages;
    }

    /**
     * @return int
     */
    public function getErrorCount(): int
    {
        return $this->wrappedClass->getErrorCount();
    }

    /**
     * @return int
     */
    public function getWarningCount(): int
    {
        return $this->wrappedClass->getWarningCount();
    }
}
