<?php

namespace Database\Factories;

use App\Models\PendingGarment;
use App\Models\User;
use App\Models\Garment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendingGarmentFactory extends Factory
{
    protected $model = PendingGarment::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'garment_id' => Garment::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'submitted_at' => now(),
        ];
    }
}
