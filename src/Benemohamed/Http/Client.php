<?php

namespace Benemohamed\Http;

use Benemohamed\Util\RandomUserAgent;
use Benemohamed\Util\Plugin;
use Benemohamed\Util\Banner;
use Benemohamed\Util\Log;
use Benemohamed\Config\Configuration;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

/**
 * Class Client
 * @package Benemohamed\Http
 */
class Client
{

    /**
     * @var array
     */
    public static array $list_links;

    /**
     * @var array
     */
    public static array $list_plugins;

    /**
     * @var int
     */
    public static int $total_links;

    /**
     * @var int
     */
    public static int $total_plugins;

    /**
     *  Check if plugin is existe.
     * @param $input
     * @param $output
     * @param $params sample conditions
     * @param $config sample conditions
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public static function GetPlugin($input, $output, $params, $config)
    {
        $filesystem = new Filesystem();

        self::$list_plugins = file(($input->getArgument('plugin') ? $input->getArgument('plugin') : __DIR__ . './../../Data/popular_plugin.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //
        self::$total_plugins = count(self::$list_plugins);

        if ($params == 'file') {
            $output->writeln((new Banner())->getRand());
            self::$list_links = file($input->getArgument('url'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            self::$total_links = count(self::$list_links);
            $progressBar = new ProgressBar($output, (self::$total_links * self::$total_plugins));
            $progressBar->setBarCharacter('<fg=magenta>=</>');
            /** @see https://apps.timwhitlock.info/emoji/tables/unicode */
            $progressBar->setProgressCharacter("\xF0\x9F\x94\xA5");
            $progressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');

            $table = new Table($output);
            $table->setHeaders(['Website', 'Status', 'Plugin name'])->setColumnWidth(0, 15)->setColumnWidth(3, 10);
            $rows = [];
            foreach (self::$list_links as $link) {
                $random = RandomUserAgent::agent();
                $client = new CurlHttpClient(['headers' => [
                    'User-Agent' => $random,
                ]]);
                foreach (self::$list_plugins as $plugin) {

                    $plugin_name = Plugin::getPluginName('-', $plugin);
                    try {
                        $url = $link . '/wp-content/plugins/' . $plugin . '/';
                        $response = $client->request('GET', $url);
                        new Log('good', $link . "," . $plugin_name);
                        $rows[] = [$link, "<info>Found</info>", "<comment>{$plugin_name}</comment>"];
                    } catch (\Exception $e) {
                        new Log('bad', $link . "," . $plugin_name);
                        $rows[] = [$link, "<error>Not found</error>", "<comment>{$plugin_name}</comment>"];
                    }

                }
                $progressBar->advance();
            }
            if ($input->getOption('output')) {
                foreach ($rows as $index) {
                    $filesystem->appendToFile($input->getOption('output'), $index[0] . ',' . $index[1] . ',' . $index[2] . "\n");
                }

            }
            $progressBar->finish();
            $output->writeln('');
            $output->writeln('');
            $output->writeln('');
            $table->setRows($rows);
            $table->render();
        }
    }
}
