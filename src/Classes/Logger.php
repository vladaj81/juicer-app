<?php

namespace App\Classes;

class Logger 
{
    private bool $enabled;

    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    // Log an info message
    public function info(string $message): void
    {
        if ($this->enabled) {
            echo "[INFO] {$message}" ."<br/>";
        }
    }

    // Disable logging
    public function disable(): void
    {
        $this->enabled = false;
    }

    // Enable logging
    public function enable(): void
    {
        $this->enabled = true;
    }
}