<?php
namespace Metis\Strategy;

interface StrategyInterface
{
    public function getUri($serviceName);
    public function updateServices($services);

    protected function setOptions($options);
    protected function loadState();
}
