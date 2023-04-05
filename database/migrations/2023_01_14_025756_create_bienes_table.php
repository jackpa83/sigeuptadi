<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes', function (Blueprint $table) {
            $table->id();
            $table->string('num_bienes',255);
            $table->string('modelo',255);
            $table->unsignedBigInteger('marcas_id')->nullable();
            $table->unsignedBigInteger('categorias_id')->nullable();
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->string('estado_bien',255);
            $table->string('serial_bien',255);
            $table->foreign('marcas_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('bienes');
    }
}
