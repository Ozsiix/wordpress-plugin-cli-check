<?php


namespace Benemohamed\Util;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class Hidden
 * @package Benemohamed\Util
 */
class Hidden
{

    /**
     * @var string
     */
    const FOLDER = '.wp-p-c';

    /**
     * @var string
     */
    const QUERY = 'query';

    /**
     * @var string
     */
    public string $file;

    /**
     * @var string
     */
    public string $home;

    /**
     * @var string
     */
    public string $date;

    /**
     * @var string
     */
    public string $folder;


    /**
     * Hidden constructor.
     */
    public function __construct()
    {
        if (isset($_SERVER['HOME'])) {
            $this->home = $_SERVER['HOME'] . '/';
        } else {
            $this->home = $_SERVER['HOMEPATH'] . '/';
        }
        $this->folder = $this->home . self::FOLDER;
        //(!file_exists($this->date) ? touch($this->date) : null);

        $filesystem = new Filesystem();

        try {
            $filesystem->mkdir($this->folder, 0777);
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at " . $exception->getPath();
        }
    }
}
