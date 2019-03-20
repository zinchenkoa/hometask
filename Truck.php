<?php

require_once __DIR__ . '/Car.php';

class Truck extends Car
{
    /**
     * @var float
     */
    private $loadCapacity;

    /**
     * @return float
     */
    public function getLoadCapacity(): float
    {
        return $this->loadCapacity;
    }

    /**
     * @param float $loadCapacity
     */
    public function setLoadCapacity(float $loadCapacity): void
    {
        $this->loadCapacity = $loadCapacity;
    }
}