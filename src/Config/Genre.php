<?php

namespace App\Config;

enum Genre: string {
    case FEMME = 'Femme';
    case HOMME = 'Homme';

    public static function getValue(): array {
        return [
            'Femme',
            'Homme',
        ];
    }
}