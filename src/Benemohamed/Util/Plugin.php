<?php


namespace Benemohamed\Util;


/**
 * Class Plugin
 * @package Benemohamed\Util
 */
class Plugin
{

    public static string $plugin;


    /**
     * @param string $delimiters
     * @param string $string
     * @return string
     */
    public static function getPluginName(string $delimiters = '-', string $string)
    {
        $launch = explode($delimiters, $string);

        self::$plugin = '';
        foreach ($launch as $index) {
            self::$plugin .= ucfirst(strtolower($index . ' '));
        }
        return self::$plugin;
    }
}
