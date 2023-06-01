<?php

namespace Database\Seeders;

use App\Models\Campeonato;
use App\Models\Deporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
class CampeonatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campeonato::create([
            'idDeporte' => 1,
            'NombreCam' => 'Segunda Categoría de Bolívar 2023', 
            'DescripcionCam' => 'Campeonato Profesional de Fútbol de Segunda Categoría de Bolívar 2023', 
            'FechaInicioCam' => '2023-05-20', 
            'PortadaCam' => 'portada', 
            'DescuentoCam' => 0
        ]);
    }
}
