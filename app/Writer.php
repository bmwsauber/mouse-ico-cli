<?php

namespace App;

class Writer
{
    public function __construct(private Config $config)
    {
    }

    public function writeTemplate(int $percentage): void
    {
        $content = sprintf(
            "<fn=1>%d%%</fn>",
            $percentage
        );

        $file = $this->config->getTemplateFile();
        file_put_contents($file, $content);
    }
}