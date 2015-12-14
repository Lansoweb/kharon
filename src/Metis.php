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

    public function getServer($namespace)
    {
        return $this->strategy->getServer($namespace);
    }

    public function updateServices($services)
    {
        return $this->strategy->updateServices($services);
    }

}
