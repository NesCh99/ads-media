<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'ADS SPORTS',
           'type' => User::ADMIN,
           'email' => 'admin@admin.com',
           'password' => bcrypt( '12345678'),
           'email_verified_at' => now(),

        ])->assignRole('Administrador');
        User::create([
            'name' => 'Nestor Chela',
            'type' => User::ADMIN,
            'email' => 'administrador@admin.com',
            'expiration_date' => '2099-01-01',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Klever Castillo',
            'type' => User::ADMIN,
            'email' => 'gestor@admin.com',
            'expiration_date' => '2022-06-21',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ])->assignRole('Gestor de Contenido');
        User::create([
            'name' => 'Cliente',
            'type' => User::CLIENT,
            'email' => 'cliente@cliente.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::factory(10)->create();

    }
}
