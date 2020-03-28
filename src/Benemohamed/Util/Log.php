<?php


namespace Benemohamed\Util;

use Benemohamed\Util\Hidden;

/**
 * Class Log
 * @package Benemohamed\Util
 */
class Log extends Hidden
{
    /**
     * Log constructor.
     * @param string $filename
     * @param string $data
     */
    public function __construct(string $filename, string $data)
    {
        parent::__construct();
        $this->filesystem->appendToFile($this->date . '/' . $filename.'.csv', $data."\n");
    }
}