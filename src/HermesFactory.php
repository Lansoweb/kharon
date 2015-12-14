<?php

namespace Metis;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Hermes\Api\ClientFactory;

class HermesFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hermesFactory = new ClientFactory();
        $hermes = $hermesFactory->createService($serviceLocator);

        $metisFactory = new Factory();
        $metis = $metisFactory->createService($serviceLocator);

        return $hermes->setLoadBalance($metis);
    }
}
