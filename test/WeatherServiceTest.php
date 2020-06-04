<?php

use PHPUnit\Framework\TestCase;
use RLDatix\Service\WeatherService;

class WeatherServiceTest extends TestCase
{
    private $_weatherService;

    /**
     * @before
     */
    public function setUpSomeSharedFixtures()
    {
        $this->_weatherService = new WeatherService();
    }

    public function testFetchAndSaveWeatherInvalidCity()
    {
        $result = $this->_weatherService->fetchAndSaveWeather('invalidcity');
        $this->assertEquals($result, 'Weather not saved!');
    }

    public function testShowWeatherInvalidCity()
    {
        $string = '123123';
        $result = $this->_weatherService->showWeather('invalidcity');
        $expectedResult = 'Weather information not found for this city invalidcity on this date '.date('Y-m-d');
        $this->assertEquals($result, $expectedResult);
    }
}
