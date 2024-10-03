<?php

use PHPUnit\Framework\TestCase;
use App\Garden;
use App\AppleTree;
use App\PearTree;

class GardenTest extends TestCase
{
    public function testAddAppleTree()
    {
        $garden = new Garden();
        $garden->addTree(new AppleTree(1));

        $trees = $garden->getTrees();
        $this->assertCount(1, $trees);
        $this->assertInstanceOf(AppleTree::class, $trees[0]);
    }

    public function testAddPearTree()
    {
        $garden = new Garden();
        $garden->addTree(new PearTree(11));

        $trees = $garden->getTrees();
        $this->assertCount(1, $trees);
        $this->assertInstanceOf(PearTree::class, $trees[0]);
    }
}
