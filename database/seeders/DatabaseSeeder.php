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
        $this->call([
            UserSeeder::class,
            NationalSeeder::class,
            AchievementSeeder::class,
            BloodlineSeeder::class,
            BloodlineImageSeeder::class,
            RegionalLocationSeeder::class,
            RegionalSeeder::class,
        ]);
    }
}
