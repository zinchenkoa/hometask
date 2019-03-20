<?php
declare(strict_types=1);

require_once __DIR__ . '/Truck.php';
require_once __DIR__ . '/PassengerCar.php';
require_once __DIR__ . '/Catalog.php';

$truck = new Truck();
$truck->setBrand('MAN');
$truck->setModel('TGS');
$truck->setYear(2016);
$truck->setVin('1HGBH41JXMN109186');
$truck->setLoadCapacity(1.5);

$passengerCar = new PassengerCar();
$passengerCar->setBrand('BMW');
$passengerCar->setModel('M4');
$passengerCar->setYear(2014);
$passengerCar->setVin('1HBBH41JXLN152475');
$passengerCar->setEquipment('Comfort');

$catalog = new Catalog();
$catalog->addCar($truck);
$catalog->addCar($passengerCar);
$catalog->printBrands();
