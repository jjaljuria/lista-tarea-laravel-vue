<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ContadorPomodoro extends Model
{
    protected $table = "contadorPomodoros";
    protected $fillable = [
        'pomodorosActivos', 'periodoDescanso', 'tiempoPomodoroActualEnSegundos',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    
}
