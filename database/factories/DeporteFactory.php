<?php

namespace Database\Factories;

use App\Models\Deporte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deporte>
 */
class DeporteFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->name();
        $image = $this->faker->numberBetween(1,3);
        return [
            'NombreDep' => $nombre,
            'PortadaDep' =>'',
            'DescripcionDep' => $this->faker->text(100),
            
           
        ];
    }
}
