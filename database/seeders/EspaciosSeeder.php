<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EspaciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('espacios')->insert([
            "nom_espacio" =>"Almacen bienes nacionales",
            "ubicacion_id"=>1,
            "estatus_id"  =>1,
            "estados_id"  =>1,
            "desc_espacio"=>"Almacenamiento de Todo tipo de bienes",
        ]);
    }
}
