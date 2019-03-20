<?php

class Car
{
    /**
     * @var string
     */
    protected $brand;

    /**
     * @var int
     */
    protected $year;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $vin;

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getVin(): string
    {
        return $this->vin;
    }

    /**
     * @param string $vin
     */
    public function setVin(string $vin): void
    {
        $this->vin = $vin;
    }

}