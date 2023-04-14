<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ContactCommand extends Command {
    protected function configure () {
        $this->setName('contact')
            ->setDescription('Links to my social media and email');
    }

    protected function execute (InputInterface $input, OutputInterface $output) {
        $output->writeln('Contact me');
        $output->writeln('');

        $table = new Table($output);
        $table->setStyle('compact');

        $table->setRows([
            ['Email:', 'kontakt@krzysztof-moskalik.pl'],
            ['Github:', 'https://github.com/KrzysztofMoskalik'],
            ['LinkedIn:', 'https://pl.linkedin.com/in/krzysztof-moskalik-20ab4091'],
            ['Twitter:', 'https://twitter.com/ChrisMoskalik']
        ]);

        $table->render();

        return 0;
    }
}