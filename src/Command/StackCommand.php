<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackCommand extends Command {
    protected function configure () {
        $this->setName('stack')
            ->setDescription('Experience with languages, tools and other stuff.');
        $this->setHidden(true);
    }

    protected function execute (InputInterface $input, OutputInterface $output): int {
        $output->writeln('My stack:');

        return 0;
    }
}