<?php

use PHPUnit\Framework\TestCase;
use App\PearTree;

class PearTreeTest extends TestCase
{
    public function testPearWeightWithinRange()
    {
        $pearTree = new PearTree(11);
        $pears = $pearTree->harvest();

        foreach ($pears as $pear) {
            $this->assertGreaterThanOrEqual(130, $pear->getWeight());
            $this->assertLessThanOrEqual(170, $pear->getWeight());
        }
    }

    public function testPearCountWithinRange()
    {
        $pearTree = new PearTree(11);
        $pears = $pearTree->harvest();

        $this->assertGreaterThanOrEqual(0, count($pears));
        $this->assertLessThanOrEqual(20, count($pears));
    }
}
