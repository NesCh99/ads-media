<?php

namespace Database\Seeders;

use App\Models\Campeonato;
use App\Models\Video;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        

        for($i=1;$i<=20;$i++){

            $values = array(
                'idVideo' => Video::all()->random()->idVideo,
                'idCliente' => 1,
                'TipoSus' =>  1,
                'CreacionSus' =>  '2004-03-17',


            );

            DB::table('suscripciones')->insert($values);



        }



       



    }
}
