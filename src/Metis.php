<?php
namespace Metis;

use Metis\Strategy\StrategyInterface;

class Metis
{

    private $strategy;

    private $options;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getUri($namespace)
    {
        return $this->strategy->getUri($namespace);
    }

    public function updateServices($services)
    {
        return $this->strategy->updateServices($services);
    }

}
