<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Files\File;

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
     * @return array
     */
    public function getAllErrorMessages(): array
    {
        $allErrorMessages = [];
        $errors = $this->wrappedClass->getErrors();

        \array_walk_recursive($errors, function (&$item, $key) use (&$allErrorMessages): void {
            if ($key === 'message') {
                $allErrorMessages[] = $item;
            }
        });

        return $allErrorMessages;
    }

    /**
     * @return array
     */
    public function getAllWarningMessages(): array
    {
        $getAllWarningMessages = [];
        $warnings = $this->wrappedClass->getWarnings();

        foreach ($warnings as $warning) {
            $getAllWarningMessages[] = \reset($warning)[0]['message'];
        }

        return $getAllWarningMessages;
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
