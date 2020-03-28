<?php


namespace Benemohamed\Command;

use Benemohamed\Exception\WpException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Benemohamed\Http\Client;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputOption;

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
            ->addArgument('url', InputArgument::REQUIRED, 'Pass websitesfile list.')
            ->addArgument('plugin', InputArgument::OPTIONAL, 'Pass  plugins file list.')
            ->addOption(
                'output',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Write to file instead of stdout')
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
     * @throws WpException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        if (file_exists($input->getArgument('url'))) {
            Client::GetPlugin($input, $output, 'file', [1], $output);
        } else {
            throw new WpException('Please provide target list');
        }
        return 0;
    }
}
