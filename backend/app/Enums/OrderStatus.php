<?php

namespace App\Enums;

enum OrderStatus:string
{
    case EnAttente = 'en_attente';
    case Acceptee = 'acceptee';
    case Enpreparation = 'en_preparation';
    case Pret = 'pret';
    case Annulee = 'annulee';
    case Refusee= 'refusee';
}
