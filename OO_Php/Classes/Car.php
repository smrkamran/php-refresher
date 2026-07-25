<?php
class Car
{
    private $brand;
    private $color;
    private $vehicleType = "car";

    public function __construct($brand, $color = "unknown")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Getters and Setters
    public function getVehicleType()
    {
        return $this->vehicleType;
    }
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;
    }

    public function getCarInfo()
    {
        return "The car is a " . $this->color . " " . $this->brand . ".";
    }
}