<?php

namespace Metis;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\StorageFactory;

class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $metisConfig = $config['metis'];
        $storageConfig = $metisConfig['storage'];
        $serverList = $metisConfig['server_list'];

        $hermes = $serviceLocator->get(\Hermes\Api\Client::class);
        $storage = StorageFactory::factory($storageConfig);

        return new Metis($hermes, $storage, $options);
    }
}
