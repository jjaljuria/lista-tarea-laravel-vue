<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pomodoro extends Model
{
    protected $table = "pomodoros";
    protected $fillable = [
        'pomodorosActivos', 'periodoDescanso', 'tiempoPomodoroActualEnSegundos',
    ];
    
}
