<?php
namespace Metis\Strategy;

final class RoundRobin extends AbstractStrategy
{

    private $pointer = 0;

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::getUri()
     */
    public function getUri($serviceName)
    {
        if (! array_key_exists($serviceName, $this->services)) {
            throw new \InvalidArgumentException("Service '$serviceName' not found");
        }

        $list = $this->services[$serviceName];

        ++ $this->pointer;
        if ($this->pointer >= count($list)) {
            $this->pointer = 0;
        }

        $this->saveState();

        return $list[$this->pointer]['uri'];
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::loadState()
     */
    public function loadState()
    {
        $this->pointer = (int) $this->storage->getItem('metis.pointer');
    }

    private function saveState()
    {
        $this->storage->setItem('metis.pointer', $this->pointer);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Metis\Strategy\StrategyInterface::setOptions()
     */
    public function setOptions($options)
    {
        // TODO Auto-generated method stub
    }
}
