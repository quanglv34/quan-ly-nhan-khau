<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DanhMucQuy>
 */
class DanhMucQuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tenQuy' => $this->faker->words(5, true),
            'ngayBatDau' => $this->faker->dateTimeBetween('-60 days', '-30 days'),
            'ngayKetThuc' => $this->faker->dateTimeBetween('+30 days', '+60 days'),
            'loaiQuy' => $this->faker->numberBetween(0,1),
        ];
    }
}
