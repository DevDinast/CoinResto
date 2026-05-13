<?php

namespace App\Enums;

enum RestaurantStatus:string
{
    case EnAttente = 'en_attente';
    case Actif = 'actif';
    case Suspendu = 'suspendu';
}
