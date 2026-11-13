<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@disfarma.hn'],
            [
                'name' => 'Administrador DISFARMA',
                'password' => Hash::make('admin123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'yzepeda@disfarma.hn'],
            [
                'name' => 'YADIRA ZEPEDA',
                'password' => Hash::make('yadira123'),
            ]
        );
    }
}
