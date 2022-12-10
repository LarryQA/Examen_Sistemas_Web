<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_clase')->unique();
            $table->string('nombre_clase');
            $table->string('descripcion_clase')->nullable();
            $table->string('grado_clase')->nullable();
            $table->string('seccion_clase')->nullable();
            $table->boolean('autoasignar')->default(true);               
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
        Schema::dropIfExists('clases');
    }
};
