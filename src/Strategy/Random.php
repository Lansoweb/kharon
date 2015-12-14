<?php
namespace Metis\Strategy;

final class Random extends AbstractStrategy
{

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::getService()
     */
    public function getService($serviceName)
    {
        if (! array_key_exists($serviceName, $this->services)) {
            throw new \InvalidArgumentException("Namespace '$serviceName' not found");
        }

        $list = $this->services[$serviceName];

        return $list[array_rand($list)];
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::setOptions()
     */
    protected function setOptions($options)
    {
        // Nothing to do here
    }

    /**
     * {@inheritDoc}
     * @see \Metis\Strategy\StrategyInterface::loadState()
     */
    protected function loadState()
    {
        // Nothing to do here
    }

}
