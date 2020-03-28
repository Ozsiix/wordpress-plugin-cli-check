<?php


namespace Benemohamed\Util;


/**
 * Class RandomUserAgent
 * @package Benemohamed\Util
 */
class RandomUserAgent
{

    /**
     * @return array
     */
    public static function agent()
    {
        $file = file(__DIR__ . './../../Data/agent.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return $file[rand(0, count($file) - 1)];
    }
}
