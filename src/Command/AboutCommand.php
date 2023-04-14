<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AboutCommand extends Command {
    protected function configure () {
        $this->setName('about')
            ->setDescription('About Me');
    }

    protected function execute (InputInterface $input, OutputInterface $output) {
        $output->writeln('Hi! I\'m Krzysztof Moskalik');
        $output->writeln('');
        $output->writeln('I\'m PHP developer, based on Kraków, Poland, with over 10 years of commercial experience.');
        $output->writeln('My biggest passion are new technologies in any kind:');
        $output->writeln('from software development, internet, customer electronics to motor-sport and aviation.');
        $output->writeln('In free time I like to play some video games, watch movies, series or Youtube.');
        $output->writeln('When weather permits, I like to go hiking or spend time close to water (lake or sea).');
        $output->writeln('As befits a fan of new technologies, my main kind of music is electronic one, but I also play guitar.');
        $output->writeln('');
        $output->writeln('More about me on my socials (type `[[!;;;internal;#contact]contact]` command)');

        return 0;
    }

}