<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Helper\Simulator;

$simulator = new Simulator();

// Run the simulation
$simulator->simulateJuicer();