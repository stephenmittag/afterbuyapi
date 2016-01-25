<?php

namespace Wk\AfterbuyApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $invalidLanguageCode = function ($v) {
            return preg_match('/^[a-z]{2}$/', $v) === 0;
        };

        $treeBuilder = new TreeBuilder();
        $treeBuilder
            ->root('wk_afterbuy_api')
            ->children()
                ->arrayNode('partner')
                    ->children()
                        ->integerNode('id')
                            ->isRequired()
                            ->min(1)
                        ->end()
                        ->scalarNode('password')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('user')
                    ->children()
                        ->scalarNode('id')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('password')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('error_language')
                    ->info('ISO 639-1 language code for error response messages')
                    ->example('de')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->defaultValue('en')
                    ->validate()
                        ->ifTrue($invalidLanguageCode)
                        ->thenInvalid('Invalid language code %s. It should consist of two letters.')
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
