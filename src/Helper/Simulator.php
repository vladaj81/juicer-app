<?php

namespace App\Helper;

use App\Classes\Apple;
use App\Classes\Juicer;
use App\Classes\Logger;

class Simulator
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger(true);
    }

    // Simulation of Juicer Actions
    public function simulateJuicer(): void
    {
        $juicer = new Juicer(20.0); // Juicer with a 20L container
        $actionCount = 100;

        for ($i = 1; $i <= $actionCount; $i++) {
            echo "Action #$i:\n";

            // Every 9th action, add an apple
            if ($i % 9 == 0) {
                $appleVolume = rand(1, 5) / 10; // Random apple volume between 0.1L and 0.5L
                $apple = new Apple($appleVolume);
                $status = $apple->isRotten() ? "rotten" : "fresh";

                if ($apple->isRotten()) {
                    $message = "Apple status is: {$status}. It will not be added to the container.";
                    $this->logger->info($message);
                } else {
                    $message = "Adding an apple (Volume: {$appleVolume}L, Status: $status).";
                    $this->logger->info($message);
                    $juicer->addFruit($apple);
                }
            }

            // Squeeze fruits every action
            $juicer->squeezeFruits();
        }

        $message = "Simulation complete! Total juice produced: {$juicer->getTotalJuice()}L.";
        $this->logger->info($message);
    }
}