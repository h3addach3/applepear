<?php

namespace App;

class PearTree extends Tree {
    public function harvest(): array {
        $pears = [];
        $pearCount = rand(0, 20);

        for ($i = 0; $i < $pearCount; $i++) {
            $pear = new Pear($this->id);
            $pear->setWeight(rand(130, 170));
            $pears[] = $pear;
        }

        return $pears;
    }
}