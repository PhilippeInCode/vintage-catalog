<?php

namespace Database\Factories;

use App\Models\Garment;
use Illuminate\Database\Eloquent\Factories\Factory;

class GarmentFactory extends Factory
{
    protected $model = Garment::class;

    public function definition(): array
    {
        return [
            'name' => 'Chaqueta A-2',
            'description' => 'Chaqueta de aviador',
            'origin_country' => 'Seychelles',
            'production_year' => 1931,
            'production_period' => 'años 30',
            'usage_type' => 'military', 
            'usage_year' => 1943,
            'used_country' => 'P. Goldsmith Sons Co.',
            'materials' => 'algodón',
        ];
    }
}
