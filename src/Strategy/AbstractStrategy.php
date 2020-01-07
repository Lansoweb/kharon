<?php
namespace Metis\Strategy;

use Laminas\Cache\Storage\StorageInterface;

abstract class AbstractStrategy implements StrategyInterface
{

    protected $services;

    protected $storage;

    protected $options;

    public function __construct(StorageInterface $storage = null, $options = [])
    {
        $this->storage = $storage;

        if (! array_key_exists('services', $options)) {
            throw new \InvalidArgumentException("Missing 'services' configuration.");
        }

        $this->services = $this->updateServices($options['services']);

        $this->setOptions($options);
        $this->loadState();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::updateServices()
     */
    public function updateServices($services)
    {
        if (!is_array($services)) {
            throw new \InvalidArgumentException("Service list must be an array.");
        }
        $this->services = $services;

        return $this->services;
    }

    protected function loadState()
    {
    }
}
