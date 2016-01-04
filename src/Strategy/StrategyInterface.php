<?php
namespace Metis\Strategy;

interface StrategyInterface
{
    public function getUri($serviceName);
    public function updateServices($services);
    public function setOptions($options);
}
