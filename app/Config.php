<?php

namespace App;

class Config
{
    private string $iniFile;
    private string $deviceName;
    private string $tmpFile;
    private string $templateFile;
    private string $template;

    public function __construct()
    {
        $this->setIniFile('.mouse-ico');
        $configIni = parse_ini_file($this->getIniFile());
        $this->setDeviceName($configIni['device_name']);
        $this->setTmpFile($configIni['tmp_output']);
        $this->setTemplateFile($configIni['template_file']);
        $this->setTemplate($configIni['output_template']);
    }

    public function getIniFile(): string
    {
        return $this->iniFile;
    }

    public function setIniFile(string $iniFile): void
    {
        $this->iniFile = $iniFile;
    }

    private function setDeviceName(string $deviceName): void
    {
        $this->deviceName = $deviceName;
    }

    private function setTmpFile(string $tmpFile): void
    {
        $this->tmpFile = $tmpFile;
    }

    private function setTemplateFile(string $templateFile): void
    {
        $this->templateFile = $templateFile;
    }

    public function getDeviceName(): string
    {
        return $this->deviceName;
    }

    public function getTmpFile(): string
    {
        return $this->tmpFile;
    }

    public function getTemplateFile(): string
    {
        return $this->templateFile;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    private function setTemplate(string $template): void
    {
        $this->template = $template;
    }


}