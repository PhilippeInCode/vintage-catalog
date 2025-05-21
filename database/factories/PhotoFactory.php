<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Garment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition(): array
    {
        return [
            'garment_id' => Garment::factory(),
            'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/hz01w9jzauwfz1qgz1s8.png',
        ];
    }
}
