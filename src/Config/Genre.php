<?php

namespace App\Config;

enum Genre: string {
    case FEMME = 'Femme';
    case HOMME = 'Homme';

    public function getValue(): string {
        return $this->value;
    }
}