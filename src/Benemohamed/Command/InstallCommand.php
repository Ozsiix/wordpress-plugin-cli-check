<?php


namespace Benemohamed\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * Class InstallCommand
 * @package Benemohamed\Command
 */
class InstallCommand extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('install')
            ->setDescription('Shows the short information install .')
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
<info>install</info>
<comment>install
See https://install.org/ for more information.</comment>
EOT
        );

        return 0;
    }
}