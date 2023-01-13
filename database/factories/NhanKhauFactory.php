<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class NhanKhauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'maNhanKhau' => 'NK'.$this->faker->randomNumber(5, true),
            'hoVaTen'    => $this->faker->lastName().' '.
                $this->faker->firstName(),
            'ngaySinh'   => $this->faker->dateTimeThisDecade(),
            'gioiTinh'   => $this->faker->boolean(),
            'ngayChuyenDen' => $this->faker->dateTimeThisDecade(),
            'queQuan'    => $this->faker->city(),
        ];
    }
}
