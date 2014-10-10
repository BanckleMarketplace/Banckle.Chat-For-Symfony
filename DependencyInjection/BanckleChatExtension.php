<?php

namespace Banckle\ChatBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class BanckleChatExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
	$loader->load('services.xml');
		
	$configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

	if (!isset($config['apiKey'])) {
            throw new \InvalidArgumentException('The "apiKey" must be set');
    	}
		
	$container->setParameter('apiKey', $config['apiKey']);
	$container->setParameter('banckleAccountUri', $config['banckleAccountUri']);
	$container->setParameter('banckleChatUri', $config['banckleChatUri']);
    }
    
}
