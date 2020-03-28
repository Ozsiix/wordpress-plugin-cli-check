<?php


namespace Benemohamed\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Benemohamed\Http\Client;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class TargetCommand
 * @package Benemohamed\Command
 */
class TargetCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('target')
            ->setDescription('Shows the short information target .')
            ->addArgument('url', InputArgument::REQUIRED, 'Pass a website or file list.')
            ->setHelp(
                <<<EOT
<info>target  about</info>
EOT
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        if (file_exists($input->getArgument('url'))) {
            Client::GetPlugin($input, $output, 'file', [1], $output);
        } else {
            Client::GetPlugin($input, $output, 'url', [1], $output);
        }
        return 0;
    }
}
