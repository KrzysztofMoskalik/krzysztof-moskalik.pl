<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CommandNotFound extends Command {
    protected function configure () {
        $this->setName('command-not-found')
            ->setHidden(true);
    }

    protected function execute (InputInterface $input, OutputInterface $output): int {
        $output->writeln('Command not found. Type `[[!;;;internal;#help]help]` to see available commands.');

        return 0;
    }
}