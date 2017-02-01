<?php
namespace Loevgaard\EconomicBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class LoevgaardEconomicExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('loevgaard_economic.base_uri',                 $config['base_uri']);
        $container->setParameter('loevgaard_economic.connect_timeout',          $config['connect_timeout']);
        $container->setParameter('loevgaard_economic.timeout',                  $config['timeout']);
        $container->setParameter('loevgaard_economic.app_secret_token',         $config['app_secret_token']);
        $container->setParameter('loevgaard_economic.agreement_grant_token',    $config['agreement_grant_token']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
