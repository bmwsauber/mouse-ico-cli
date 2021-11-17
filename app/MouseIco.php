<?php

namespace App;

use Exception;

class MouseIco
{
    private Parser $parser;
    private Writer $writer;

    public function __construct()
    {
        $config = new Config();
        $this->parser = new Parser($config);
        $this->writer = new Writer($config);
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
            ->prepareContent($percentage);

        $this->writer
            ->writeTemplate($contents);
    }
}