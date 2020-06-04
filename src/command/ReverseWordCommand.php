<?php

// src/command/ReverseWordCommand.php

namespace RLDatix\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RLDatix\Service\ReverseService;

class ReverseWordCommand extends Command
{
    // the name of the command
    protected static $defaultName = 'rld:reverse-word';

    private $reverseService;

    public function __construct(ReverseService $reverseService)
    {
        $this->reverseService = $reverseService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        // short description
        ->setDescription('Reverse the given word.')

        // configure an argument
        ->addArgument('word', InputArgument::REQUIRED, 'The word to formate in reverse.')

        // full command description shown when running the command with "--help" option
        ->setHelp('This command helps to reverse the gived word...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $reversedWord = $this->reverseService->reverseWord($input->getArgument('word'));

        $output->writeln("REVERSE: $reversedWord");

        return Command::SUCCESS;
    }
}
