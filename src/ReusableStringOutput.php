<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ReusableStringOutput extends Command
{
    protected function configure()
    {
        $this
            ->setName('reusable_string')
            ->setDescription('Многоразовый вывод строки')
            ->addArgument('string', InputArgument::REQUIRED)
            ->addOption('times', null, InputOption::VALUE_OPTIONAL, '', 2)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('times')) {
            for ($i = 0; $i < $input->getOption('times'); $i++) {
                $output->writeln($input->getArgument('string'));
            }
        } else {
            $output->writeln($input->getArgument('string'));
        }


        return Command::SUCCESS;
    }
}
