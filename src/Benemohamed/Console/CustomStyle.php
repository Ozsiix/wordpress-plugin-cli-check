<?php

namespace Benemohamed\Console;

use Symfony\Component\Console\Style\StyleInterface;

class CustomStyle implements StyleInterface
{
    // ...implement the methods of the interface
    /**
     * @inheritDoc
     */
    public function title($message)
    {
        // TODO: Implement title() method.
    }

    /**
     * @inheritDoc
     */
    public function section($message)
    {
        // TODO: Implement section() method.
    }

    /**
     * @inheritDoc
     */
    public function listing(array $elements)
    {
        // TODO: Implement listing() method.
    }

    /**
     * @inheritDoc
     */
    public function text($message)
    {
        // TODO: Implement text() method.
    }

    /**
     * @inheritDoc
     */
    public function success($message)
    {
        // TODO: Implement success() method.
    }

    /**
     * @inheritDoc
     */
    public function error($message)
    {
        // TODO: Implement error() method.
    }

    /**
     * @inheritDoc
     */
    public function warning($message)
    {
        // TODO: Implement warning() method.
    }

    /**
     * @inheritDoc
     */
    public function note($message)
    {
        // TODO: Implement note() method.
    }

    /**
     * @inheritDoc
     */
    public function caution($message)
    {
        // TODO: Implement caution() method.
    }

    /**
     * @inheritDoc
     */
    public function table(array $headers, array $rows)
    {
        // TODO: Implement table() method.
    }

    /**
     * @inheritDoc
     */
    public function ask($question, $default = null, $validator = null)
    {
        // TODO: Implement ask() method.
    }

    /**
     * @inheritDoc
     */
    public function askHidden($question, $validator = null)
    {
        // TODO: Implement askHidden() method.
    }

    /**
     * @inheritDoc
     */
    public function confirm($question, $default = true)
    {
        // TODO: Implement confirm() method.
    }

    /**
     * @inheritDoc
     */
    public function choice($question, array $choices, $default = null)
    {
        // TODO: Implement choice() method.
    }

    /**
     * @inheritDoc
     */
    public function newLine($count = 1)
    {
        // TODO: Implement newLine() method.
    }

    /**
     * @inheritDoc
     */
    public function progressStart($max = 0)
    {
        // TODO: Implement progressStart() method.
    }

    /**
     * @inheritDoc
     */
    public function progressAdvance($step = 1)
    {
        // TODO: Implement progressAdvance() method.
    }

    /**
     * @inheritDoc
     */
    public function progressFinish()
    {
        // TODO: Implement progressFinish() method.
    }
}
