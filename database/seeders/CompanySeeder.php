<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Somos la plataforma digital de ADS Publicidad',
            'slogan' => 'Los nuevos expertos en publicidad.',
            'information' => 'ADS Media Comunicación / Publicidad / STREAMING DEPORTIVO E INSTITUCIONAL/ Marketing',
            'image' => '',
        ]);
    }
}
