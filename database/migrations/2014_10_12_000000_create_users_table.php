<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefone')->unique();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();

            $table->string('role')->nullable();
            $table->string('setor1')->nullable(); //Local Versão 2024
            $table->string('setor2')->nullable();
            $table->string('setor3')->nullable();
            $table->longtext('description')->nullable();
            $table->string('on')->nullable();
            $table->json('options')->nullable();
            $table->json('days')->nullable();
            $table->json('subsDay')->nullable();
            $table->softDeletes(); //Soft Delete
        });

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'josebrunoleite@gmail.com',
            'password' => Hash::make('josebrunoleite'),
            'role' => 'admin',
            'telefone' => '00000000000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
