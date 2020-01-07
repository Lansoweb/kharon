<?php
namespace Metis;

use Hermes\Api\ClientFactory;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class HermesFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
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
