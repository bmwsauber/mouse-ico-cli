<?php

namespace App;

use Exception;
use App\Template\Template;
use App\Template\Color;

class MouseIco
{
    private Parser $parser;
    private Template $writer;
    private Color $color;

    public function __construct()
    {
        $config = new Config();
        $this->parser = new Parser($config);
        $this->color = new Color($config);
        $this->writer = new Template($config);
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        $percentage = $this->parser->parseOutput()->getPercentage();
        $color = $this->color->getColor($percentage);

        $contents = $this->writer
            ->fill($color, $percentage);

        $this->writer
            ->write($contents);
    }
}