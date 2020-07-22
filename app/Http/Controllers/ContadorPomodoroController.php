<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContadorPomodoro;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class ContadorPomodoroController extends Controller
{
    private $id = 8;
    public function index(){
        return ContadorPomodoro::where('idUsuario','=', $this->id)->get(['pomodorosActivos', 'tiempoPomodoroActualEnSegundos']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request los datos de los campos pomodorosActivos y tiempoPomodoroActualEnSegundos
     * @return bool true
     */
    public function update(Request $request){
        $pomodorosActivos = $request->pomodorosActivos;
        $tiempoPomodoroActualEnSegundos = $request->tiempoPomodoroActualEnSegundos;

        $contadorPomodoro = ContadorPomodoro::where('idUsuario', '=', $this->id)->first();
        $contadorPomodoro->pomodorosActivos = $pomodorosActivos;
        $contadorPomodoro->tiempoPomodoroActualEnSegundos = $tiempoPomodoroActualEnSegundos;
        $contadorPomodoro->save();
    }
}
