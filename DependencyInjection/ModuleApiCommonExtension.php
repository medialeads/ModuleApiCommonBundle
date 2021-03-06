<?php

namespace Module\ApiCommonBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ModuleApiCommonExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $requiredBundles = array(
            'MisdPhoneNumberBundle'
        );
        $bundles = $container->getParameter('kernel.bundles');
        foreach ($requiredBundles as $requiredBundle) {
            if (!isset($bundles[$requiredBundle])) {
                throw new \Exception();
            }
        }

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('module_contact.yml');
        $loader->load('module_quote_history.yml');
    }
}
