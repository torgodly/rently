<?php

namespace App\Enums;

use App\Traits\Enum;

enum UserType: string
{
    use Enum;

    case User = 'user';
    case Admin = 'admin';
    case Manager = 'manager';
}
