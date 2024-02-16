<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'example1',
        //     'email'=>'example1@gmail.com',
        //     'password'=>'1234',
        //     'phone_id'=>'1'
        // ]);
        // User::create([
        //     'name' => 'example2',
        //     'email'=>'example2@gmail.com',
        //     'password'=>'1234',
        //     'phone_id'=>'2'
        // ]);
        // User::create([
        //     'name' => 'example3',
        //     'email'=>'example3@gmail.com',
        //     'password'=>'1234',
        //     'phone_id'=>'3'
        // ]);
    }
}
