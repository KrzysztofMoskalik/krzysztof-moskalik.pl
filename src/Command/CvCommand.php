<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class CvCommand extends Command {
    protected function configure () {
        $this->setName('cv')
            ->setDescription('My commercial experience');
    }

    protected function execute (InputInterface $input, OutputInterface $output) {
        $output->writeln('Curriculum Vitae');
        $output->writeln('');

        $table = new Table($output);
        $table->setHeaders(['Date', 'Company', 'Position']);
        $table
            ->setRows([
                [new TableCell('', ['colspan' => 3])],
                new TableSeparator(),
                ['June 2020 - August 2022', 'Velis', 'PHP Backend Developer'],
                new TableSeparator(),
                ['December 2019 - May 2020', 'Nonstop', 'PHP Backend Developer (Laravel)'],
                new TableSeparator(),
                ['November 2017 - November 2019', 'Creativestyle', 'PHP Backend Developer (Magento, Symfony)'],
                new TableSeparator(),
                ['June 2014 - October 2017', 'Codete', 'PHP Fullstack Developer (Symfony)'],
                new TableSeparator(),
                ['January 2014 - May 2014', 'Axis Media Unlimited', 'Web Developer'],
                new TableSeparator(),
                ['June 2012 - December 2013', 'Fabryka Stron Internetowych', 'Web Developer'],
            ])
        ;
        $table->render();

        $stacks = [
            'PHP      ' => 80,
            'Symfony  ' => 70,
            'Laravel  ' => 40,
            'Phalcon  ' => 30,
            'Magento 2' => 50,
            'PHPUnit  ' => 60,
            'Docker   ' => 80,
            'Vagrant  ' => 70,
            'Git      ' => 80,
            'REST     ' => 70,
        ];

        foreach ($stacks as $stackName => $stackValue) {
            $progressBar = new ProgressBar($output, 100);
            $progressBar->setFormat( $stackName . " %bar% %percent%%");
            $progressBar->setProgress($stackValue);
            $progressBar->display();
        }

        $output->writeln('');
        $output->writeln('');
        $output->writeln('Basics of:');
        $output->writeln('- frontend development (HTML, CSS, JS, jQuery, nodeJS, React, Dojo)');
        $output->writeln('- mobile development (Dojo and Cordova Phonegap for Android and iOS)');
        $output->writeln('- devOps (Jenkins, Docker, Ansible, Nginx, Apache, AWS)');
        $output->writeln('- IoT');

        $output->writeln('');
        $output->writeln('IDE: PHPStorm');
        $output->writeln('OS: Linux (on daily basis), Windows, MacOs');
        $output->writeln('Issue Trackers: YouTrack, Jira, Redmine, Trello');
        $output->writeln('Other known languages: Python, Pascal, C++, Delphi');

        $output->writeln('');
        $output->writeln('Other:');
        $output->writeln('Scrum, Kanban');
        $output->writeln('Good english knowledge');

        $output->writeln('');
        $output->writeln('Little participation on open-source projects (see my GitHub profile)');
        $output->writeln('Participant of Symfony Live, Meet Magento and many local conferences');

        return 0;
    }
}