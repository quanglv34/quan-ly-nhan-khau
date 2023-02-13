<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HoKhau>
 */
class HoKhauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'diaChi' => $this->faker->address(),
            'maHoKhau' => 'HK' . $this->faker->postcode(),
            'maKhuVuc' => 'KV' . $this->faker->postcode(),
            'ngayLap' => $this->faker->dateTimeThisDecade(),
            'nguoiThucHienId' => User::first()->id,
        ];
    }
}
