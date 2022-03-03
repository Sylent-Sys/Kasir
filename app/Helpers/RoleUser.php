<?php
namespace App\Helpers;
class RoleUser {
    public const PENGGUNA = 1;
    public const WAITER = 2;
    public const KASIR = 3;
    public const OWNER = 4;
    public const ADMIN = 5;
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
