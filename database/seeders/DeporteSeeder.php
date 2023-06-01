<?php

namespace Database\Seeders;

use App\Models\Campeonato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

use App\Models\Deporte;
class DeporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deporte::create([
            'NombreDep' => 'Fútbol', 
            'PortadaDep' => 'portada', 
            'DescripcionDep' => 'Vive la emoción del deporte rey a través de ADS Media'
        ]);
    }
}
