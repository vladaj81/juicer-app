<?php
namespace App\Classes;

use App\Classes\Fruit;

// Derived Apple Class
class Apple extends Fruit
{
    private bool $isRotten;

    public function __construct(float $volume)
    {
        // Randomly assign a color
        $colors = ["red", "green", "yellow"];
        $color = $colors[array_rand($colors)];

        parent::__construct($color, $volume);

        // 20% chance the apple is rotten
        $this->isRotten = mt_rand(1, 100) <= 20;
    }
    
    public function isRotten(): bool
    {
        return $this->isRotten;
    }

    public function getJuiceVolume(): float
    {
        // Rotten apples yield no juice
        return $this->isRotten ? 0 : parent::getJuiceVolume();
    }
}