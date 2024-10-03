<?php

namespace App;

class Pear extends Fruit
{
    public function __construct(int $treeId)
    {
        parent::__construct($treeId);
    }
}