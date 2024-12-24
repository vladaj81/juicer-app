<?php
namespace App\Classes;

use App\Interfaces\Squeezable;

// Base Fruit Class
class Fruit implements Squeezable
{
    protected string $color;
    protected float $volume; // in liters

    public function __construct(string $color, float $volume)
    {
        $this->color = $color;
        $this->volume = $volume;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getJuiceVolume(): float
    {
        // 50% of the fruit volume becomes juice
        return $this->volume * 0.5;
    }
}