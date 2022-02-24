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
            'name' => 'admin',
            'role'=>RoleUser::ADMIN,
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_aktif'=>true
        ]);
        User::factory()->count(5)->create();
    }
}
