<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

class CreacionTablaPomodoro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contadorPomodoros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUsuario')->unsigned();
            $table->foreign('idUsuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('pomodorosActivos')->default(4);
            $table->integer('tiempoPomodoroActualEnSegundos')->default(1500);
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
        Schema::dropIfExists('pomodoros');
    }
}
