<?php

require_once __DIR__ . '/Car.php';

class Catalog
{
    /**
     * @var Car[]
     */
    public $cars = [];

    /**
     * @param Car $car
     */
    public function addCar(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function printBrands()
    {
        foreach ($this->cars as $car) {
            echo $car->getBrand() . PHP_EOL;
        }
    }
}