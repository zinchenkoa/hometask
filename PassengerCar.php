<?php

require_once __DIR__ . '/Car.php' ;

class PassengerCar extends Car
{
    /**
     * @var string
     */
    private $equipment;

    /**
     * @return string
     */
    public function getEquipment(): string
    {
        return $this->equipment;
    }

    /**
     * @param string $equipment
     */
    public function setEquipment(string $equipment): void
    {
        $this->equipment = $equipment;
    }
}