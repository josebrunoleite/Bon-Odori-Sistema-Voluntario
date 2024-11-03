<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpiMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpi_maquinas', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nome');
            $table->string('dado1')->nullable();
            $table->string('dado2')->nullable();
            $table->string('dado3')->nullable();
            $table->string('localizacao')->nullable();
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
        Schema::dropIfExists('rpi_maquinas');
    }
}
