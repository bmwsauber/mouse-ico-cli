<?php

namespace App;

class Writer
{
    public function __construct(private Config $config)
    {
    }

    public function writeTemplate(string $content): void
    {
        $filePath = $this->config->getTemplateFile();
        file_put_contents($filePath, $content);
    }

    public function prepareContent(int $percentage): string
    {
        return sprintf(
            $this->config->getTemplate(),
            $this->chargeLevelColor($percentage),
            $percentage
        );
    }

    private function chargeLevelColor(int $percentage): string
    {
        $colors = $this->config->getChargeColor();

        if ($percentage === 100) {
            return $colors['full'];
        }
        if ($percentage >= 55) {
            return $colors['semi'];
        }

        if ($percentage >= 20) {
            return $colors['low'];
        }

        return $colors['empty'];
    }
}