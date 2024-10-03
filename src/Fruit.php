<?php

namespace App;

abstract class Fruit
{
    protected float $weight;
    protected int $treeId;

    public function __construct(int $treeId)
    {
        $this->treeId = $treeId;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function getTreeId(): int {
        return $this->treeId;
    }
}
