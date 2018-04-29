<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function(Blueprint $table){
          $table->increments('id');
          $table->string('perfil');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf')
            ->unique();
            $table->string('phone');
            $table->string('email')
            ->unique();
            $table->string('password');
            $table->integer('perfil_id')
            ->unsigned()
            ->default(2);
            $table->integer('status')->unsigned()->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('perfil_id')->references('id')->on('perfis');
        });
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
