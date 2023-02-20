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
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' =>  random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Medio digital de noticias',
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Produccion y Postproducion de videos, spots',
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Diseño Gráfico Multimedia Profesional',
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        
        Service::create([
            'name' => 'Fotografia Digital Comercial',
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


        Service::create([
            'name' => 'Operations',
            'body' => 'Plan it, create it, launch it. Collaborate seamlessly with all the organization and hit your marketing goals every month with our marketing plan.',
            'icon' => random_int(1,20),
            'company_id' => 1,

        ]);


    }
}
