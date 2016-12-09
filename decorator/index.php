<?php

/**
 * That allows behavior to be added to an individual object, either statically or dynamically, without affecting the
 * behavior of other objects from the same class. The decorator pattern is often useful for adhering to the Single
 * Responsibility Principle, as it allows functionality to be divided between classes with unique areas of concern
 */

interface CarService {
    public function getCost();

    public function getDescription();
}

class BasicService implements CarService
{
    public function getCost()
    {
        return 19;
    }

    public function getDescription()
    {
        return "Base Service";
    }
}

class OilChange implements CarService
{
    /**
     * @var CarService
     */
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 19 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription().', and oil change';
    }
}

class TireRotation implements CarService
{
    /**
     * @var CarService
     */
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 10 + $this->carService->getCost();
    }

    public function getDescription()
    {
       return $this->carService->getDescription().', and tire rotation';
    }
}

$service = (new TireRotation(new OilChange(new BasicService())));

echo 'Service: '.$service->getDescription().PHP_EOL;
echo 'Price: '.$service->getCost();