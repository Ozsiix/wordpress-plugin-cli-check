<?php


namespace Benemohamed\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HomeCommand
 * @package Benemohamed\Command
 */
class HomeCommand extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('home')
            ->setDescription('Shows the short information home .')
            ->setHelp(
                <<<EOT
<info>php ssss.phar about</info>
EOT
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            <<<EOT
<info>home</info>
<comment>home
See https://home.org/ for more information.</comment>
EOT
        );

        return 0;
    }
}