<?php
namespace Loevgaard\EconomicBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('loevgaard_economic');

        $rootNode
            ->children()
                ->scalarNode('base_uri')->defaultValue('https://restapi.e-conomic.com')->end()
                ->scalarNode('app_secret_token')->defaultValue('demo')->end() // we use the default values from the e-conomic documentation
                ->scalarNode('agreement_grant_token')->defaultValue('demo')->end()
                ->integerNode('connect_timeout')->defaultValue(60)->end()
                ->integerNode('timeout')->defaultValue(600)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}