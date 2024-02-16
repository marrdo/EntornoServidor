<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\PhoneSeeder as SeedersPhoneSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        ProvinciaSeeder::class,
        PhoneSeeder::class,
        UserSeeder::class
    ]);

    }
}
