<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'idCampeonato' => 1,
            'NombreVid' => 'Dep. San Luis vs Unibolívar', 
            'DescripcionVid' => 'Fecha 1', 
            'PortadaVid' => 'Portada',
            'FechaInicioVid' => '2023-05-20', 
            'HoraInicioVid' => '11:00:00',
            'PrecioVid' => 0,
            'EstadoVid' => 1
        ]);
        Video::create([
            'idCampeonato' => 1,
            'NombreVid' => 'Juventud Minera vs Guaranda FC', 
            'DescripcionVid' => 'Fecha 1', 
            'PortadaVid' => 'Portada',
            'FechaInicioVid' => '2023-05-20', 
            'HoraInicioVid' => '14:00:00',
            'PrecioVid' => 0,
            'EstadoVid' => 1
        ]);
        Video::create([
            'idCampeonato' => 1,
            'NombreVid' => 'Primero de Mayo vs Mineros SC', 
            'DescripcionVid' => 'Fecha 1', 
            'PortadaVid' => 'Portada',
            'FechaInicioVid' => '2023-05-20', 
            'HoraInicioVid' => '14:00:00',
            'PrecioVid' => 1,
            'EstadoVid' => 1
        ]);
        Video::create([
            'idCampeonato' => 1,
            'NombreVid' => ' Atl. El Conde vs Dep. Echeandía', 
            'DescripcionVid' => 'Fecha 1', 
            'PortadaVid' => 'Portada',
            'FechaInicioVid' => '2023-05-21', 
            'HoraInicioVid' => '14:00:00',
            'PrecioVid' => 0,
            'EstadoVid' => 1
        ]);
    }
}
