<?php

namespace App\Command;

use KrzysztofMoskalik\ClassLoader\ClassLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelpCommand extends Command {
    protected function configure () {
        $this->setName('help')
            ->setDescription('Available commands');
    }

    protected function execute (InputInterface $input, OutputInterface $output): int {
        $output->writeln('Krzysztof Moskalik\'s Homepage');
        $output->writeln('PHP Developer');
        $output->writeln('');
        $output->writeln('Available commands:');
        $output->writeln('');

        $loader = new ClassLoader();
        $commands = $loader->loadClassesFromDirectory(
            __DIR__ . '/../../src/Command',
            [],
            Command::class
        );

        $commandsSorted = [];
        foreach ($commands as $command) {
            $commandsSorted[$command->getName()] = $command;
        }

        ksort($commandsSorted);

        $table = new Table($output);
        $table->setStyle('compact');

        /** @var Command $command */
        foreach ($commandsSorted as $command) {
            if ($command->isHidden()) {
                continue;
            }
            $table->addRow([
                '[[!;;;internal;#' . $command->getName() . ']' . $command->getName() . ']',
                '',
                $command->getDescription()
            ]);
        }
        $table->render();

        return 0;
    }
}