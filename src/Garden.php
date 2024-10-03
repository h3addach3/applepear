<?php

namespace App;

class Garden
{
    private array $trees = [];

    public function addTree(Tree $tree): void
    {
        $this->trees[] = $tree;
    }

    public function harvestAll(): array
    {
        $allFruits = [];
        foreach ($this->trees as $tree) {
            $allFruits = array_merge($allFruits, $tree->harvest());
        }
        return $allFruits;
    }

    public function getTrees(): array
    {
        return $this->trees;
    }

    public function initializeTrees(int $appleCount, int $pearCount): void
    {
        for ($i = 1; $i <= $appleCount; $i++) {
            $this->addTree(new AppleTree($i));
        }
        for ($i = $appleCount + 1; $i <= $appleCount + $pearCount; $i++) {
            $this->addTree(new PearTree($i));
        }
    }
}
