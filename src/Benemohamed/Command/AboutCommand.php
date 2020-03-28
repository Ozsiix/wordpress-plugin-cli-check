<?php

namespace Benemohamed\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AboutCommand
 * @package Benemohamed\Command
 */
class AboutCommand extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('about')
            ->setDescription('Shows the short information about .')
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
        $output->writeln('<info>About</info><comment> See https://get.org/ for more information.</comment>');

        return 0;
    }
}