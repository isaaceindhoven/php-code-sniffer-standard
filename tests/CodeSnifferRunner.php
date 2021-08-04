<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Exceptions\DeepExitException;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Reporter;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Runner;
use RuntimeException;

use function file_get_contents;
use function sprintf;

class CodeSnifferRunner
{
    /** @var Runner $codeSniffer */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $codeSniffer;

    /** @var string $sniff */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $sniff;

    /** @var string $path */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $path;

    /**
     * @throws DeepExitException
     */
    public function __construct()
    {
        Config::setConfigData('report_format', 'full');

        $this->codeSniffer = new Runner();
        $this->codeSniffer->config = new Config();
        $this->codeSniffer->reporter = new Reporter($this->codeSniffer->config);
        $this->codeSniffer->init();
    }

    /**
     * @param string $sniff
     * @return CodeSnifferRunner
     */
    public function setSniff(string $sniff): CodeSnifferRunner
    {
        $this->sniff = $sniff;

        return $this;
    }

    /**
     * @param string $path
     * @return void
     */
    public function setFolder(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @param string $fileName
     * @return CodeSnifferResults
     * @throws DeepExitException
     */
    public function sniff(string $fileName): CodeSnifferResults
    {
        $filePath = sprintf('%s%s', $this->path, $fileName);
        $this->codeSniffer->config->sniffs = [$this->sniff];
        $ruleset = new Ruleset($this->codeSniffer->config);

        $file = new File($filePath, $ruleset, $this->codeSniffer->config);
        $fileContents = file_get_contents($filePath);

        if ($fileContents === false) {
            throw new RuntimeException(sprintf('File contents could not be read from "%s"', $filePath));
        }

        $file->setContent($fileContents);
        $this->codeSniffer->processFile($file);

        return new CodeSnifferResults($file);
    }
}
