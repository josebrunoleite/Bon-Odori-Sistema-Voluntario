<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVote2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote2s', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('rissa');
            $table->string('aecio');
            $table->string('jhon');
            $table->string('lucas');
            $table->text('ip_address');
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
        Schema::dropIfExists('vote2s');
    }
}
