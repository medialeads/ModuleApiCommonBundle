<?php

namespace Module\ApiCommonBundle\DependencyInjection\Compiler;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ValidationPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('validator.builder')) {
            return;
        }

        $validationFiles = array_map(function($folder) {
            return realpath(sprintf('%s/../../%s/validation.yml', __DIR__, $folder));
        }, array(
            'ModuleContact',
            'ModuleQuoteHistory',
            'ModuleNews'
        ));

        foreach ($validationFiles as $validationFile) {
            $container->addResource(new FileResource($validationFile));
        }

        $container->getDefinition('validator.builder')->addMethodCall('addYamlMappings', array($validationFiles));
    }
}
