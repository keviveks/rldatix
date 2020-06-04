#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use RLDatix\Command\FetchWeatherCommand;
use RLDatix\Command\ShowWeatherCommand;
use RLDatix\Command\FindPalindromCommand;
use RLDatix\Command\ReverseWordCommand;
use RLDatix\Service\WeatherService;
use RLDatix\Service\PalindromService;
use RLDatix\Service\ReverseService;

$application = new Application('RLDatix', '1.0');

$application->add(new FetchWeatherCommand(new WeatherService()));
$application->add(new ShowWeatherCommand(new WeatherService()));
$application->add(new FindPalindromCommand(new PalindromService()));
$application->add(new ReverseWordCommand(new ReverseService()));

$application->run();
