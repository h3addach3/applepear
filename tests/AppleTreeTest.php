<?php

use PHPUnit\Framework\TestCase;
use App\AppleTree;

class AppleTreeTest extends TestCase
{
    public function testAppleWeightWithinRange()
    {
        $appleTree = new AppleTree(1);
        $apples = $appleTree->harvest();

        foreach ($apples as $apple) {
            $this->assertGreaterThanOrEqual(150, $apple->getWeight());
            $this->assertLessThanOrEqual(180, $apple->getWeight());
        }
    }

    public function testAppleCountWithinRange()
    {
        $appleTree = new AppleTree(1);
        $apples = $appleTree->harvest();

        $this->assertGreaterThanOrEqual(40, count($apples));
        $this->assertLessThanOrEqual(50, count($apples));
    }
}
