<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GarmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('garments')->insert([
            [
                'name' => 'A-2 Flight Jacket',
                'description' => 'Chaqueta de vuelo utilizada por pilotos del Ejército de EE.UU. durante la Segunda Guerra Mundial.',
                'origin_country' => 'United States',
                'production_year' => 1931,
                'production_period' => '1930s',
                'usage_type' => 'military',
                'usage_year' => 1943,
                'used_country' => 'United States',
                'materials' => 'Horsehide leather, cotton lining',
            ],
            [
                'name' => 'M-65 Field Jacket',
                'description' => 'Chaqueta de campo usada por el ejército estadounidense desde la guerra de Vietnam.',
                'origin_country' => 'United States',
                'production_year' => 1965,
                'production_period' => '1960s',
                'usage_type' => 'military',
                'usage_year' => 1968,
                'used_country' => 'Vietnam, United States',
                'materials' => 'Nylon-cotton blend',
            ],
            [
                'name' => 'French Chore Coat',
                'description' => 'Prenda de trabajo azul usada por obreros franceses desde principios del siglo XX.',
                'origin_country' => 'France',
                'production_year' => 1910,
                'production_period' => '1910s',
                'usage_type' => 'work',
                'usage_year' => 1920,
                'used_country' => 'France',
                'materials' => 'Cotton moleskin',
            ],
            [
                'name' => 'Norwegian Army Snow Smock',
                'description' => 'Capa exterior utilizada por el ejército noruego para operaciones en la nieve.',
                'origin_country' => 'Norway',
                'production_year' => 1970,
                'production_period' => '1970s',
                'usage_type' => 'military',
                'usage_year' => 1980,
                'used_country' => 'Norway',
                'materials' => 'Cotton, canvas',
            ],
            [
                'name' => 'Vintage Adidas Track Jacket',
                'description' => 'Chaqueta deportiva clásica de Adidas, popularizada en los años 70 por atletas y fans.',
                'origin_country' => 'Germany',
                'production_year' => 1972,
                'production_period' => '1970s',
                'usage_type' => 'sport',
                'usage_year' => 1975,
                'used_country' => 'Germany',
                'materials' => 'Polyester',
            ],
        ]);
    }
}
