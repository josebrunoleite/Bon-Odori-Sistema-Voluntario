<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpiMaquinaDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpi_maquina_dados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maquina_id')->constrained('rpi_maquinas');
            $table->float('temperatura'); 
            $table->float('umidade');
            $table->float('ruido');
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
        Schema::dropIfExists('rpi_maquina_dados');
    }
}
