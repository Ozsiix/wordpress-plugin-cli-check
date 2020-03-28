<?php


namespace Benemohamed\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetCommand
 * @package Benemohamed\Command
 */
class GetCommand extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('get')
            ->setDescription('Shows the short information get .')
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
<info>get</info>
<comment>get
See https://get.org/ for more information.</comment>
EOT
        );

        return 0;
    }
}