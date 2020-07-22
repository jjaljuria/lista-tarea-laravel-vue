<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContadorPomodoro extends Model
{
    protected $table = "contadorPomodoros";
    protected $fillable = [
        'pomodorosActivos', 'periodoDescanso', 'tiempoPomodoroActualEnSegundos',
    ];
    
}
