<?php

namespace App;

class Writer
{
    public function __construct(private Config $config)
    {
    }

    public function writeTemplate(int $percentage): void
    {
        $chargeLevelColor = $this->chargeLevelColor($percentage);


        $content = sprintf(
            $this->config->getTemplate(),
            $chargeLevelColor,
            $percentage
        );

        $file = $this->config->getTemplateFile();
        file_put_contents($file, $content);
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