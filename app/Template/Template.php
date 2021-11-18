<?php

namespace App\Template;

use App\Config;

class Template
{
    public function __construct(private Config $config)
    {
    }

    public function fill(mixed ...$params): string
    {
        return vsprintf(
            $this->config->getTemplate(),
            $params
        );
    }

    public function write(string $content): void
    {
        $filePath = $this->config->getTemplateFile();
        file_put_contents($filePath, $content);
    }
}