<?php


namespace Benemohamed\Console;

use Symfony\Component\Console\Application as App;

use Benemohamed\Command;
use Benemohamed\Util;

/**
 * Class Application
 * @package Benemohamed\Console
 */
class Application extends App
{

    /**
     * Application constructor.
     */
    public function __construct()
    {
        parent::__construct('Echo', '1.0.0.0');
        new Util\Hidden();
        $this->add(new Command\AboutCommand());
        $this->add(new Command\TargetCommand());
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return (new Util\Banner())->getRand() . parent::getHelp();
    }
}
