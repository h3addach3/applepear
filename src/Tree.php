<?php

namespace App;

abstract class Tree
{
    protected int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    abstract public function harvest(): array;
}
