<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('t_incidencia',100);
            $table->string('cod_bienes',100);
            $table->string('descripcion',255);
            $table->string('fecha_incidencia',250)->nullable();
            $table->string('nom_espacio',250);
            $table->string('est_incidencia',250);
            $table->string('solventado_por',250)->nullable();
            $table->string('fecha_solucion',250);
            $table->string('registrado_por',250);
            $table->string('img',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
