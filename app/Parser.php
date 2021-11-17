<?php

namespace App;

class Parser
{

    private int $percentage;

    public function __construct(private Config $config)
    {
    }

    public function parseUpower(): void
    {
        $this->writeTmpFile();
        $this->matchPercentage();
    }

    private function writeTmpFile(): void
    {
        $command = sprintf(
            'upower -i %s > %s',
            $this->config->getDeviceName(),
            $this->config->getTmpFile(),
        );

        system($command, $result_code);
    }

    private function matchPercentage(): void
    {
        $output = file_get_contents($this->config->getTmpFile());
        preg_match('/percentage:\s*(\d*)%/', $output, $matches);
        $this->percentage = $matches[1];
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }
}