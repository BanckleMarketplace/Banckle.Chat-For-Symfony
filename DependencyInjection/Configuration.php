<?php

namespace Banckle\ChatBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\NodeInterface
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('banckle_chat');
		
	$rootNode
            ->children()
            ->scalarNode('apiKey')->end()
            ->scalarNode('banckleAccountUri')->end()
            ->scalarNode('banckleChatUri')->end()
            ->end();

        return $treeBuilder;
    }
    
}
