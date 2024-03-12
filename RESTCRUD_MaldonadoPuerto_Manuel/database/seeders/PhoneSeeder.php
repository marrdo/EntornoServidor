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
            'numero' => '689111111',
            'user_id'=> '1'
        ]);
        Phone::create([
            'numero' => '689222222',
            'user_id'=> '2'
        ]);
        Phone::create([
            'numero' => '689333333',
            'user_id'=> '3'

        ]);
    }
}
