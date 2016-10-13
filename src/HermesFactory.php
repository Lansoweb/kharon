<?php
namespace Metis;

use Hermes\Api\ClientFactory;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class HermesFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hermesFactory = new ClientFactory();
        $hermes = $hermesFactory->createService($container);

        $metisFactory = new Factory();
        $metis = $metisFactory->createService($container);

        $hermes->setLoadBalance($metis);

        return $hermes;
    }

    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, HermesFactory::class);
    }
}
