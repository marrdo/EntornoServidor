<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::create([
            'numero' => '689540832',
        ]);
        Phone::create([
            'numero' => '689540832',
        ]);
        Phone::create([
            'numero' => '689540832',

        ]);
    }
}
