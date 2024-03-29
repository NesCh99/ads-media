<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Campeonato;
use App\Models\Publicidad;
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

        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DeporteSeeder::class);
        $this->call(CampeonatoSeeder::class);
        $this->call(VideoSeeder::class);

        $this->call(CompanySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TermConSeeder::class);
    }
}
