<?php
namespace App\Classes;

use App\Interfaces\Squeezable;

// Strainer Class
class Strainer
{
    public function squeeze(array $fruits): float
    {
        $totalJuice = 0.0;

        foreach ($fruits as $fruit) {
            if ($fruit instanceof Squeezable) {
                $juice = $fruit->getJuiceVolume();
                $totalJuice += $juice;
            }
        }

        return $totalJuice;
    }
}