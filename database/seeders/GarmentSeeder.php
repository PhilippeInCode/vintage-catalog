<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Garment;

class GarmentSeeder extends Seeder
{
    public function run(): void
    {
        $garments = [
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
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/hz01w9jzauwfz1qgz1s8.png',
            ],
            [
                'name' => 'M-65 Field Jacket',
                'description' => 'Chaqueta de campo usada por el ejército estadounidense desde la guerra de Vietnam.',
                'origin_country' => 'United States',
                'production_year' => 1965,
                'production_period' => '1960s',
                'usage_type' => 'military',
                'usage_year' => 1968,
                'used_country' => 'United States',
                'materials' => 'Nylon-cotton blend',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/nat2dawj3j4n0urvgbua.png',
            ],
            [
                'name' => 'N-1 Deck Jacket',
                'description' => 'Chaqueta de servicio naval de la Marina de EE.UU., diseñada para condiciones climáticas extremas en cubierta.',
                'origin_country' => 'United States',
                'production_year' => 1944,
                'production_period' => '1940s',
                'usage_type' => 'military',
                'usage_year' => 1945,
                'used_country' => 'United States',
                'materials' => 'Cotton jungle cloth, wool lining',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/tbc3ywtk2wbzfhky5wyx.png',
            ],
            [
                'name' => 'Cotton Canvas Deck Shoes',
                'description' => 'Zapatillas ligeras usadas por marineros estadounidenses durante entrenamientos en cubierta.',
                'origin_country' => 'United States',
                'production_year' => 1940,
                'production_period' => '1940s',
                'usage_type' => 'sport',
                'usage_year' => 1942,
                'used_country' => 'United States',
                'materials' => 'Cotton canvas, rubber sole',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041146/be6p7ccegku6cfzoh2hi.png',
            ],
            [
                'name' => 'Dartford Jeans (Fullcount Model)',
                'description' => 'Pantalones de mezclilla japonesa inspirados en modelos Levi\'s de los años 60, reconocidos por su corte recto y tejido selvage.',
                'origin_country' => 'Japan',
                'production_year' => 2010,
                'production_period' => '2010s',
                'usage_type' => 'work',
                'usage_year' => 2012,
                'used_country' => 'Japan',
                'materials' => '100% Cotton selvage denim',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041146/htamjs3ahh6krnuwqrqd.png',
            ],
            [
                'name' => 'Trouser, Cotton, Khaki, 1941',
                'description' => 'Pantalones de algodón caqui utilizados por el Ejército de los EE.UU. durante la Segunda Guerra Mundial. Diseñados para ser resistentes, funcionales y cómodos en entornos de combate.',
                'origin_country' => 'United States',
                'production_year' => 1941,
                'production_period' => '1940s',
                'usage_type' => 'military',
                'usage_year' => 1944,
                'used_country' => 'United States',
                'materials' => '100% Cotton chino cloth',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1748433037/PantalonAncho_ao9pzh.png',
            ],
            [
                'name' => 'Oxford Cotton Button Down Shirt',
                'description' => 'Camisa clásica de algodón con cuello abotonado, popularizada en entornos formales e informales desde mediados del siglo XX. Versátil y duradera, es un elemento básico en armarios masculinos.',
                'origin_country' => 'United States',
                'production_year' => 1960,
                'production_period' => '1960s',
                'usage_type' => 'formal',
                'usage_year' => 1970,
                'used_country' => 'United States',
                'materials' => '100% Oxford cotton',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1748433246/q_1_yk5dlt.png',
            ],
            [
                'name' => 'N-3 Cap in Olive Cotton Herringbone Twill',
                'description' => 'Gorra de servicio militar usada por el ejército estadounidense en condiciones de clima frío. Fabricada con sarga espiguilla para mayor resistencia y camuflaje en entornos boscosos.',
                'origin_country' => 'United States',
                'production_year' => 1944,
                'production_period' => '1940s',
                'usage_type' => 'military',
                'usage_year' => 1945,
                'used_country' => 'United States',
                'materials' => 'Olive cotton herringbone twill',
                'image_url' => 'https://res.cloudinary.com/dk1g12n2h/image/upload/v1748433452/xx_vl12fr.png',
            ],
        ];

        foreach ($garments as $data) {
            $garment = Garment::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'origin_country' => $data['origin_country'],
                'production_year' => $data['production_year'],
                'production_period' => $data['production_period'],
                'usage_type' => $data['usage_type'],
                'usage_year' => $data['usage_year'],
                'used_country' => $data['used_country'],
                'materials' => $data['materials'],
            ]);

            $garment->photos()->create([
                'image_url' => $data['image_url']
            ]);
        }
    }
}
