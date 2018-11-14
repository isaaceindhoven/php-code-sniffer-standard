<?php

declare(strict_types=1);

namespace IsaacCodingStandard\Tests;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Exceptions\DeepExitException;
use PHP_CodeSniffer\Exceptions\RuntimeException;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Reporter;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Runner;

class CodeSnifferRunner
{
    /** @var Runner $codeSniffer */
    protected $codeSniffer;

    /** @var string $sniff */
    protected $sniff;

    /** @var string $path */
    protected $path;

    /**
     * @throws RuntimeException
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
     * @throws RuntimeException
     */
    public function sniff(string $fileName): CodeSnifferResults
    {
        $filePath = $this->path . $fileName;

        $ruleset = new Ruleset($this->codeSniffer->config);

        $file = new File($filePath, $ruleset, $this->codeSniffer->config);
        $file->setContent(file_get_contents($filePath));
        $this->codeSniffer->processFile($file);

        return new CodeSnifferResults($file);
    }
}
