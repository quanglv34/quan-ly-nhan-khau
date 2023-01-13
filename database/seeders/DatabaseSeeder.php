<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\NhanKhau;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::query()->firstOrCreate(
            [
                'email' => 'quanglv.share@gmail.com',
            ],
            [
                'name'     => 'Vu-Quang Le',
                'password' => \Hash::make('admin@123'),
            ]
        );

        $nhanKhau = NhanKhau::factory(10)->create();
    }
}
