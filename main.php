<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Garden;
use App\FruitCollector;
use App\ResultOutput;

$garden = new Garden();
$garden->initializeTrees(10, 15);

$collector = new FruitCollector();
$result = $collector->collect($garden);

$resultOutput = new ResultOutput();
$resultOutput->printHarvestSummary($result);

$maxWeight = $collector->getMaxWeight();
$resultOutput->printHeaviestApples($collector->getHeaviestApples(), $maxWeight);