<?php

namespace App;

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
     * @throws \Throwable
     */
    public function run(): void
    {
        $this->parser->parseUpower();
        $percentage = $this->parser->getPercentage();
        $this->writer->writeTemplate($percentage);

    }
}