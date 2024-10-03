<?php

namespace App;

class FruitCollector
{
    private array $heaviestApples = [];
    private int $maxWeight = 0;

    public function collect(Garden $garden): array
    {
        $allFruits = $garden->harvestAll();
        $appleCount = 0;
        $pearCount = 0;
        $appleWeight = 0;
        $pearWeight = 0;

        foreach ($allFruits as $fruit) {
            if ($fruit instanceof Apple) {
                $appleCount++;
                $appleWeight += $fruit->getWeight();

                if ($fruit->getWeight() > $this->maxWeight) {
                    $this->maxWeight = $fruit->getWeight();
                    $this->heaviestApples = [$fruit];
                } elseif ($fruit->getWeight() == $this->maxWeight) {
                    $this->heaviestApples[] = $fruit;
                }
            } elseif ($fruit instanceof Pear) {
                $pearCount++;
                $pearWeight += $fruit->getWeight();
            }
        }

        return [
            'appleCount' => $appleCount,
            'pearCount' => $pearCount,
            'appleWeight' => $appleWeight,
            'pearWeight' => $pearWeight
        ];
    }

    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    public function getHeaviestApples(): array
    {
        return $this->heaviestApples;
    }
}
