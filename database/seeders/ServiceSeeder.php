<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Streaming deportivo e institucional',
            'body' => 'Cubrimos todos los eventos deportivos e institucionales con calidad y de manera profesional, nuestro equipo se despliega a cualquier parte del país.',
            'icon' =>  random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Marketing Digital',
            'body' => 'Haz crecer tu empresa manejando las redes sociales de la manera correcta, nosotros de ayudamos a mejorar.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Produccion y Postproducion de videos, spots',
            'body' => 'Convertimos tu material audiovisual en videos de alto nivel de acorde a tus necesidades y gustos',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Diseño Gráfico Multimedia Profesional',
            'body' => 'Nostros plasmamos tu imaginación en cotenido gráfico, para que puedas usarlo digitalmente, o imprimirlo.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        
        Service::create([
            'name' => 'Fotografia Digital Comercial',
            'body' => 'Cubrimos todo tipo de eventos con nuestro equipo fotografico profesional',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);

    }
}
