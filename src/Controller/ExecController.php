<?php

namespace App\Controller;

use App\Command\CommandNotFound;
use KrzysztofMoskalik\ClassLoader\ClassLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ExecController extends BaseController {
    public function run () {
        $template = $this->twig->load('exec.html.twig');

        $argvParams = explode(' ', $this->request->get('command'));

        $input = new ArgvInput($argvParams);

        foreach ($argvParams as &$param) {
            $param = strtolower($param);
        }

        $output = new BufferedOutput();

        $loader = new ClassLoader();
        $commands = $loader->loadClassesFromDirectory(
            __DIR__ . '/../../src/Command',
            [],
            Command::class
        );

        $commandToRun = null;

        /** @var Command $command */
        foreach ($commands as $command) {
            if ($command->getName() !== reset($argvParams) || $command->isHidden()) {
                continue;
            }
            $commandToRun = $command;
        }

        if (!$commandToRun) {
            $commandToRun = new CommandNotFound();
        }

        try {
            $commandToRun->run($input, $output);
        } catch (\Exception $exception) {
            $commandToRun = new CommandNotFound();
            $commandToRun->run(new ArgvInput(), $output);
        }

        echo $template->render(['content' => $output->fetch()]);
    }

}