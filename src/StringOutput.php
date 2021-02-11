<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StringOutput extends Command
{
    protected function configure()
    {
        $this
            ->setName('string_output')
            ->setDescription('Вывод строки')
            ->addArgument('string', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $str = 'Привет ' . $input->getArgument('string');

        $output->writeln($str);

        return Command::SUCCESS;
    }
}
