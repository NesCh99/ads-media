<?php

namespace Database\Seeders;

use App\Models\Publicidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Publicidad::create([
        'PortadaPub'=> '',
        'DescripcionPub'=> 'Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it',
        'UrlPub'=>''
       ]);


       Publicidad::create([
        'PortadaPub'=> '',
        'DescripcionPub'=> 'Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it',
        'UrlPub'=>''
       ]);

       Publicidad::create([
        'PortadaPub'=> '',
        'DescripcionPub'=> 'Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it',
        'UrlPub'=>''
       ]);


      
    }
}
