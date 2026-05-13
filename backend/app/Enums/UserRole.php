<?php

namespace App\Enums;

enum UserRole:string
{
    case Client = 'client';
    case Restaurant = 'restaurant';
    case Admin = 'admin';

}
