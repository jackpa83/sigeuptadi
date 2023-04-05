<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('departamentos')->insert(["departamento"=>"Dpto-Administracion y Contaduria"]);
            DB::table('departamentos')->insert(["departamento"=>"Dpto-Calidad de Ambiente"]);
            DB::table('departamentos')->insert(["departamento"=>"Mecanica"]);
            DB::table('departamentos')->insert(["departamento"=>"Mantenimiento"]);
            DB::table('departamentos')->insert(["departamento"=>"Informatica"]);
            DB::table('departamentos')->insert(["departamento"=>"Electronica"]);
            DB::table('departamentos')->insert(["departamento"=>"Electricidad"]);
    }  
}
