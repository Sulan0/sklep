<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const MOD = 'mod';
    const USER = 'user';

    const TYPES = [
        self::ADMIN,
        self::MOD,
        self::USER
    ];
}
