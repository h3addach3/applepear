<?php

namespace App;

class Apple extends Fruit
{
    public function __construct(int $treeId)
    {
        parent::__construct($treeId);
    }
}