<?php

use PHPUnit\Framework\TestCase;
use App\Garden;
use App\FruitCollector;
use App\AppleTree;
use App\PearTree;

class FruitCollectorTest extends TestCase
{
    public function testTreeInitialization()
    {
        $appleTree = new AppleTree(1);
        $pearTree = new PearTree(2);

        $this->assertInstanceOf(AppleTree::class, $appleTree);
        $this->assertInstanceOf(PearTree::class, $pearTree);
        $this->assertGreaterThanOrEqual(40, count($appleTree->harvest()));
        $this->assertLessThanOrEqual(50, count($appleTree->harvest()));
        $this->assertGreaterThanOrEqual(0, count($pearTree->harvest()));
        $this->assertLessThanOrEqual(20, count($pearTree->harvest()));
    }

    public function testFruitCollection()
    {
        $garden = new Garden();
        $garden->addTree(new AppleTree(1));
        $garden->addTree(new PearTree(2));

        $collector = new FruitCollector();
        $result = $collector->collect($garden);

        // Проверка кол-ва фруктов
        $this->assertArrayHasKey('appleCount', $result);
        $this->assertArrayHasKey('pearCount', $result);
        $this->assertGreaterThanOrEqual(40, $result['appleCount']);
        $this->assertLessThanOrEqual(50, $result['appleCount']);
        $this->assertGreaterThanOrEqual(0, $result['pearCount']);
        $this->assertLessThanOrEqual(20, $result['pearCount']);

        // Проверка веса фруктов
        $this->assertArrayHasKey('appleWeight', $result);
        $this->assertArrayHasKey('pearWeight', $result);
        $this->assertGreaterThanOrEqual(150 * $result['appleCount'], $result['appleWeight']);
        $this->assertLessThanOrEqual(180 * $result['appleCount'], $result['appleWeight']);
    }

    public function testHeaviestApple()
    {
        $garden = new Garden();
        for ($i = 1; $i <= 10; $i++) {
            $garden->addTree(new AppleTree($i));
        }

        $collector = new FruitCollector();
        $collector->collect($garden);
        $heaviestApples = $collector->getHeaviestApples();

        // Проверка, что самое тяжёлое яблоко является таковым
        $maxWeight = $collector->getMaxWeight();
        foreach ($heaviestApples as $apple) {
            $this->assertEquals($maxWeight, $apple->getWeight());
        }

        // Проверка на наличие хотя бы одного яблока
        $this->assertGreaterThan(0, count($heaviestApples));
    }
}
