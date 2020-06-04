<?php

// src/command/FindPalindromCommand.php

namespace RLDatix\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RLDatix\Service\PalindromService;

class FindPalindromCommand extends Command
{
    // name of the command
    protected static $defaultName = 'rld:find-palindrom';

    private $palindromService;

    public function __construct(PalindromService $palindromService)
    {
        $this->palindromService = $palindromService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        // short description
        ->setDescription('Check the given word is palindrome.')

        // configure an argument
        ->addArgument('word', InputArgument::REQUIRED, 'The word to check palindrome.')

        // full command description shown when running the command with "--help" option
        ->setHelp('This command helps to identify the palindrome words...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $isPalindrom = $this->palindromService->checkPalindrom($input->getArgument('word'));

        if ($isPalindrom) {
            $output->writeln('Whoa! a palindrome word');
        } else {
            $output->writeln('Nah! not a palindrome word');
        }

        return Command::SUCCESS;
    }
}
