<?php

namespace Database\Seeders;

use App\Models\TransaksiDetail;
use App\Models\TransaksiItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            MenuSeeder::class,
            TransaksiItem::class,
            TransaksiDetail::class,
            PembayaranSeeder::class,
        ]);
    }
}
