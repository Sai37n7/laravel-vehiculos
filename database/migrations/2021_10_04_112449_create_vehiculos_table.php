<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->nullable(false);
            $table->string('tipo')->nullable(false);
            $table->float('velmax')->nullable(false);
            $table->float('velmin')->nullable(false);
            $table->string('conductor')->nullable(false);
            $table->date('inicio_uso')->nullable(false);
            $table->date('fin_uso')->nullable(false);
            $table->string('ubicacion')->nullable(false);
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
        Schema::dropIfExists('vehiculos');
    }
}
