<?php

namespace Wk\AfterbuyApi\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WkAfterbuyApiExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $config);

        $container->setParameter('wk_afterbuy_api.error_language', $config['error_language']);
        $container->setParameter('wk_afterbuy_api.partner.id', $config['partner']['id']);
        $container->setParameter('wk_afterbuy_api.partner.password', $config['partner']['password']);
        $container->setParameter('wk_afterbuy_api.user.id', $config['user']['id']);
        $container->setParameter('wk_afterbuy_api.user.password', $config['user']['password']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
