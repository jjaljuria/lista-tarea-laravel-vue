<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pomodoro extends Model
{
    protected $table = "contadorPomodoros";
    protected $fillable = [
        'pomodorosActivos', 'periodoDescanso', 'tiempoPomodoroActualEnSegundos',
    ];
    
}
