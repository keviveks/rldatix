<?php

namespace RLDatix\Model;

use RLDatix\Lib\Database;

class WeatherModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::instance();
    }

    public function saveWeather(String $weather)
    {
        try {
            $command = $this->db->prepare(
                'INSERT INTO weather (weather_id, city, temperature, pressure, humidity, date)
                VALUES (:weather_id, :city, :temperature, :pressure, :humidity, :date)'
            );

            return $command->execute([
                'weather_id' => $weather['id'],
                'city' => $weather['name'],
                'temperature' => $weather['main']['temp'],
                'pressure' => $weather['main']['pressure'],
                'humidity' => $weather['main']['humidity'],
                'date' => date('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getWeather(String $city, $date)
    {
        try {
            $command = $this->db->prepare(
                'SELECT * FROM weather WHERE city=:city AND date=:date'
            );

            $command->execute([
                'city' => $city,
                'date' => $date,
            ]);

            return $command->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }
}
