<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tarea::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->nombreTarea = $request->nombreTarea;
        $tarea->fecha = $request->fecha;
        $tarea->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $Tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $Tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $Tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $Tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $Tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Tarea::where('id', '=', $id)->delete();
    }
}
