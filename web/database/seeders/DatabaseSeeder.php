<?php

namespace Database\Seeders;

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
        // php ./web/artisan db:seed
        $this->call([
            TotalSeeder::class,
            BottomSeeder::class,
        ]);
    }
}