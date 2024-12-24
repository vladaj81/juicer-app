<?php
namespace App\Classes;

use App\Exceptions\CapacityException;

// FruitContainer Class
class FruitContainer
{
    private float $capacity; // in liters
    private float $currentVolume = 0.0; // in liters
    private array $fruits = [];
    private int $totalFruits = 0; // Track the total number of fruits added
    private float $totalVolume = 0.0;

    public function __construct(float $capacity)
    {
        $this->capacity = $capacity;
    }

    public function addFruit(Fruit $fruit): void
    {
        if ($this->currentVolume + $fruit->getVolume() > $this->capacity) {
            throw new CapacityException("Fruit container is full. Cannot add more fruits.");
        }

        $this->fruits[] = $fruit;
        $this->currentVolume = $this->totalVolume += $fruit->getVolume();
        $this->totalFruits++;
    }

    public function getFruits(): array
    {
        return $this->fruits;
    }

    public function getCurrentVolume(): float
    {
        return $this->currentVolume;
    }

    public function getRemainingSpace(): float
    {
        return $this->capacity - $this->totalVolume;
    }

    public function clearContainer(): void
    {
        $this->fruits = [];
        $this->currentVolume = 0.0;
    }

    public function getTotalFruits(): int
    {
        return $this->totalFruits;
    }
}