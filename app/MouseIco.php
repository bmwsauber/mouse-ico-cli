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
        $this->parser->parseUpower();
        $percentage = $this->parser->getPercentage();
        $this->writer->writeTemplate($percentage);

    }
}