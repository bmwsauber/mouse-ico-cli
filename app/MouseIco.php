<?php

namespace App;

use Exception;

class MouseIco
{
    private Parser $parser;
    private Template $writer;

    public function __construct()
    {
        $config = new Config();
        $this->parser = new Parser($config);
        $this->writer = new Template($config);
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        $percentage = $this->parser
            ->parseUpower()
            ->getPercentage();

        $contents = $this->writer
            ->fill($percentage);

        $this->writer
            ->write($contents);
    }
}