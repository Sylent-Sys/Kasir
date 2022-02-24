<?php
namespace App\Helpers;
class RoleUser {
    public const ADMIN = 1;
    public const PENGGUNA = 2;
    public const WAITER = 3;
    public const KASIR = 4;
    public const OWNER = 5;
    public static function getLabel($role) {
        return match($role) {
            RoleUser::ADMIN => 'Admin',
            RoleUser::PENGGUNA => 'Pengguna',
            RoleUser::WAITER => 'Waiter',
            RoleUser::KASIR => 'Kasir',
            RoleUser::OWNER => 'Owner',
        };
    }
}
