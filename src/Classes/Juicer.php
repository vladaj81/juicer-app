<?php
namespace App\Classes;

use App\Classes\FruitContainer;
use App\Classes\Strainer;
use App\Classes\Logger;
use App\Exceptions\CapacityException;

// Juicer Class
class Juicer
{
    private FruitContainer $container;
    private Strainer $strainer;

    private Logger $logger;
    private float $totalJuice = 0.0;

    public function __construct(float $containerCapacity)
    {
        $this->container = new FruitContainer($containerCapacity);
        $this->strainer = new Strainer();
        $this->logger = new Logger(true);
    }

    public function addFruit(Fruit $fruit): void
    {
        try {
            $this->container->addFruit($fruit);

            $message = "Added a fruit (Volume: {$fruit->getVolume()}L). Total fruits in the container: {$this->container->getTotalFruits()}.
            Remaining space in the container: {$this->container->getRemainingSpace()}L.";
            
            $this->logger->info($message);
           
        } catch (CapacityException $e) {
            $message = "Error: {$e->getMessage()}";
            $this->logger->info($message);
        }
    }

    public function squeezeFruits(): void
    {
        $juice = $this->strainer->squeeze($this->container->getFruits());
        $this->totalJuice += $juice;

        $message = "Squeezed fruits! Juice obtained: {$juice}L. Total juice: {$this->totalJuice}L.";
        $this->logger->info($message);
        
        $this->container->clearContainer();
    }

    public function getTotalJuice(): float
    {
        return $this->totalJuice;
    }
}