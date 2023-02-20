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
            'name' => 'Somos el Canal Digital de la Agencia de Publicidad ADS',
            'slogan' => 'From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.',
            'information' => 'We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.

            We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick.',
            'image' => '',
        ]);
    }
}
