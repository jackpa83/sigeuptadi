<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus')->insert([
            "estatus"=>"Activo"]);
            DB::table('estatus')->insert([
                "estatus"=>"Inactivo"]);
                DB::table('estatus')->insert([
                    "estatus"=>"Reparación"]);
    }
}
