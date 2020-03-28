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
     * @var Filesystem
     */
    public Filesystem $filesystem;


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
        $this->date  = $this->folder . '/' . self::QUERY . '-' . date("Y-m-d");

        $this->filesystem = new Filesystem();

        try {
            $this->filesystem->mkdir($this->folder, 0777);
            $this->filesystem->mkdir($this->date, 0777);
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at " . $exception->getPath();
        }
    }
}
