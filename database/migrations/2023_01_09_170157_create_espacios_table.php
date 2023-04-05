<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_espacio',250);
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->unsignedBigInteger('estatus_id')->nullable();
            $table->unsignedBigInteger('estados_id')->nullable();
            $table->string('desc_espacio',255);
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
            $table->foreign('estatus_id')->references('id')->on('estatus');
            $table->foreign('estados_id')->references('id')->on('estados');
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
        Schema::dropIfExists('espacios');
    }
}
