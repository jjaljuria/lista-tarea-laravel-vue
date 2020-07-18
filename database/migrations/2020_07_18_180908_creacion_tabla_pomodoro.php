<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('pomodoros', function (Blueprint $table) {
            $table->id();
            $table->integer('pomodorosActivos')->default(4);
            $table->boolean('periodoDescanso')->default(false);
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
