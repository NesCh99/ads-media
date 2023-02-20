<?php

namespace Database\Factories;

use App\Models\Campeonato;
use App\Models\Deporte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campeonato>
 */
class CampeonatoFactory extends Factory
{

   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->name();

        
        return [
            'NombreCam' => $nombre,
            'DescripcionCam' => $this->faker->text(100),
            'FechaInicioCam' => $this->faker->dateTimeThisYear('+12 months'),
            'PortadaCam' => '',
            'DescuentoCam' => $this->faker->numerify('##'),
            'idDeporte' => Deporte::all()->random()->idDeporte
           
        ];
    }
}
