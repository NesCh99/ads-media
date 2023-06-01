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
           'name' => 'Nestor Chela',
           'type' => User::ADMIN,
           'email' => 'neschp@gmail.com',
           'password' => bcrypt( 'neschcb1499'),
           'email_verified_at' => now(),

        ])->assignRole('Administrador');
        User::create([
            'name' => 'Marco Vargas',
            'type' => User::ADMIN,
            'email' => 'mvargasc999@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ])->assignRole('Administrador');
    }
}
