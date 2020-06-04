<?php

// src/command/FetchWeatherCommand.php

namespace RLDatix\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RLDatix\Service\WeatherService;

class FetchWeatherCommand extends Command
{
    protected static $defaultName = 'rld:fetch-weather';

    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Fetch weather details from the API & store it in DB.')

            // configure an argument
            ->addArgument('city', InputArgument::REQUIRED, 'The city name to fetch from weather api.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to fetch city weather from api & store the deatils in Database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->weatherService->fetchAndSaveWeather($input->getArgument('city'));

        $output->writeln($response);

        return Command::SUCCESS;
    }
}
