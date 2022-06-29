<?php

namespace App;

use Exception;

class Parser
{
    private int $percentage;

    public function __construct(private Config $config)
    {
    }

    /**
     * @throws Exception
     */
    public function parseOutput(): self
    {
        $this->writeOutputFile();
        $this->match();

        return $this;
    }

    private function writeOutputFile(): void
    {
        $command = sprintf(
            'upower -i %s > %s',
            $this->config->getDeviceName(),
            $this->config->getTmpFile(),
        );

        system($command, $result_code);
    }

    /**
     * @throws Exception
     */
    private function match(): void
    {
        $output = file_get_contents($this->config->getTmpFile());

        preg_match('/state:\s*unknown/', $output, $matches);

        if (!empty($matches)) {
            throw new \RuntimeException('Device not found');
        }

        preg_match('/percentage:\s*(\d*)%/', $output, $matches);
        if (!is_numeric(@$matches[1])) {
            throw new \RuntimeException('Device not found');
        }

        $this->setPercentage($matches[1]);
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function setPercentage(int $percentage): void
    {
        $this->percentage = $percentage;
    }
}