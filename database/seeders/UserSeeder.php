<?php

namespace Database\Seeders;

use App\Models\User;
use App\Helpers\RoleUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'pengguna',
            'role'=>RoleUser::PENGGUNA,
            'email' => 'pengguna@pengguna.com',
            'password' => bcrypt('pengguna'),
            'is_aktif'=>true
        ]);
        User::create([
            'name' => 'waiter',
            'role'=>RoleUser::WAITER,
            'email' => 'waiter@waiter.com',
            'password' => bcrypt('waiter'),
            'is_aktif'=>true
        ]);
        User::create([
            'name' => 'kasir',
            'role'=>RoleUser::KASIR,
            'email' => 'kasir@kasir.com',
            'password' => bcrypt('kasir'),
            'is_aktif'=>true
        ]);
        User::create([
            'name' => 'owner',
            'role'=>RoleUser::OWNER,
            'email' => 'owner@owner.com',
            'password' => bcrypt('owner'),
            'is_aktif'=>true
        ]);
        User::create([
            'name' => 'admin',
            'role'=>RoleUser::ADMIN,
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_aktif'=>true
        ]);
        // User::factory()->count(5)->create();
    }
}
