<?php
namespace Tests\Feature;

use App\Config;
use App\Parser;
use Exception;
use PHPUnit\Framework\TestCase;

class GettingDataFromDeviceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_get_data_from_mouse(): void
    {
        $config = new Config();
        $parser = new Parser($config);
        $percentage = $parser->parseOutput()->getPercentage();
        self::assertIsNumeric($percentage);
    }
}