<?php


namespace Benemohamed\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration
 * @package Benemohamed\Config
 */
class Configuration
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('/home/moha/.wp-p-c/wp.yaml');

        return $treeBuilder;
    }
}