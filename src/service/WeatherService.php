<?php

// src/command/WeatherService.php

namespace RLDatix\Service;

use RLDatix\Lib\Remote;
use RLDatix\Model\WeatherModel;

class WeatherService
{
    private $_weatherUrl;
    protected $weatherModel;

    public function __construct()
    {
        $this->_weatherUrl = $_ENV['WEATHER_API_URL'].'?apiKey='.$_ENV['WEATHER_API_KEY'];

        $this->weatherModel = new WeatherModel();
    }

    public function fetchAndSaveWeather(String $city)
    {
        try {
            $response = Remote::request($this->_weatherUrl.'&q='.$city);

            $savedWeather = $this->weatherModel->saveWeather($response);

            if (!$savedWeather) {
                throw new \Exception('Weather not saved!');
            }

            return 'Weather for city: '.$city.' fetched & saved successfully';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function showWeather(String $city, $date = '')
    {
        try {
            if (!$date) {
                $date = date('Y-m-d');
            }
            $weatherDetails = $this->weatherModel->getWeather($city, $date);

            if (!$weatherDetails) {
                throw new \Exception('Weather information not found for this city '.$city.' on this date '.$date);
            }

            return json_encode($weatherDetails);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
