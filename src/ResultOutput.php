<?php

namespace App;

class ResultOutput
{
    public function printHarvestSummary(array $result): void
    {
        echo "Собрано яблок: {$result['appleCount']}\n";
        echo "Собрано груш: {$result['pearCount']}\n";
        echo "Общий вес яблок: {$result['appleWeight']} г\n";
        echo "Общий вес груш: {$result['pearWeight']} г\n";
    }

    public function printHeaviestApples(array $heaviestApples, int $maxWeight): void
    {
        if (count($heaviestApples) === 1) {
            $heaviestApple = $heaviestApples[0];
            echo "Самое тяжёлое яблоко весит {$heaviestApple->getWeight()} г, собрано с дерева №{$heaviestApple->getTreeId()}\n";
        } else {
            $appleIds = array_map(function ($apple) {
                return $apple->getTreeId();
            }, $heaviestApples);

            $appleIdsUnique = array_unique($appleIds);

            echo "Самых тяжёлых яблок весом {$maxWeight} г собрано " . count($heaviestApples) . " штук.\n";
            echo "Собраны с деревьев с ID: " . implode(', ', $appleIdsUnique) . "\n";
        }
    }
}
