<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Las abreviaturas de las comunidades han sido tomadas de: http://relojesdesol.info/files/Cod-3-4_com-prov-Espana_2007-12-22.pdf
        $provinciasAndalucia = [
            ['nombre' => 'Almería', 'abreviatura' => 'AL'],
            ['nombre' => 'Cádiz', 'abreviatura' => 'CA'],
            ['nombre' => 'Córdoba', 'abreviatura' => 'CO'],
            ['nombre' => 'Granada', 'abreviatura' => 'GR'],
            ['nombre' => 'Huelva', 'abreviatura' => 'HU'],
            ['nombre' => 'Jaén', 'abreviatura' => 'JA'],
            ['nombre' => 'Málaga', 'abreviatura' => 'MA'],
            ['nombre' => 'Sevilla', 'abreviatura' => 'SE'],
        ];
        DB::table('provincias')->insert($provinciasAndalucia);

    }
}
