<?php

// src/command/ShowWeatherCommand.php

namespace RLDatix\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RLDatix\Service\WeatherService;

class ShowWeatherCommand extends Command
{
    protected static $defaultName = 'rld:show-weather';

    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description
            ->setDescription('Show weather details from the DB.')

            // configure an argument
            ->addArgument('city', InputArgument::REQUIRED, 'The city to show weather.')

            ->addArgument('date', InputArgument::OPTIONAL, 'Date to show weather.')

            // full command description shown when running the command with "--help" option
            ->setHelp('This command allows you to show weather details stored in DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->weatherService->showWeather($input->getArgument('city'), $input->getArgument('date'));

        $output->writeln($response);

        return Command::SUCCESS;
    }
}
