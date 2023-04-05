<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicaciones')->insert([
            "ubicaciones"=>"Sede Tradicional",
            "desc_ubicaciones"=>"Almacenes Talleres y Aulas"
        ]);
    }
}
