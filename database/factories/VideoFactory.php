<?php

namespace Database\Factories;

use App\Models\Campeonato;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Video;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->text(20);
        return [
            'NombreVid' => $nombre,
            'DescripcionVid' => $this->faker->text(100),
            
            'PortadaVid' => '', 
            'EstadoVid' => 1,
            'PrecioVid' => $this->faker->numerify('##'),
            'FechaInicioVid' => $this->faker->dateTimeInInterval('-1 week', '+10 days'),
            'HoraInicioVid' => $this->faker->time('H:i:s'),
            
            'idCampeonato' => Campeonato::all()->random()->idCampeonato,
           
        ];
    }
}
