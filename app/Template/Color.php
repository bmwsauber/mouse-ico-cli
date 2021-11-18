<?php

namespace App\Template;

use App\Config;

class Color
{
    public function __construct(private Config $config)
    {
    }

    public function getColor(int $percentage): string
    {
        $colors = $this->config->getChargeColor();

        return match (true) {
            $percentage > 55 => $colors['full'],
            $percentage >= 20 => $colors['semi'],
            $percentage >= 10 => $colors['low'],
            default => $colors['empty'],
        };
    }
}
