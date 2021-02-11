<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class InteractiveSurvey extends Command
{
    protected function configure()
    {
        $this
            ->setName('quest')
            ->setDescription('Интрактивный опрос')
            ->addArgument('string', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $questionName = new Question('Ваше имя : ');
        $questionYear = new Question('Ваше возраст : ');
        $questionPol = new ChoiceQuestion(
            'Ваш пол : ',
            // choices can also be PHP objects that implement __toString() method
            ['муж', 'жен'],
            0
        );

        $bundleName = $helper->ask($input, $output, $questionName);
        $bundleYear = $helper->ask($input, $output, $questionYear);
        $bundlePol = $helper->ask($input, $output, $questionPol);

        $output->writeln(
            'Здравствуйте, Ваше имя ' . $bundleName
            . ' Ваш возраст ' . $bundleYear
            . ' Ваш пол ' . $bundlePol
        );
        return Command::SUCCESS;
    }
}
