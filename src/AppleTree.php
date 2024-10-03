<?php

namespace App;

class AppleTree extends Tree {
    public function harvest(): array {
        $apples = [];
        $appleCount = rand(40, 50);  // Количество яблок на дереве

        for ($i = 0; $i < $appleCount; $i++) {
            $apple = new Apple($this->id);
            $apple->setWeight(rand(150, 180));  // Вес в диапазоне 150-180
            $apples[] = $apple;
        }

        return $apples;
    }
}