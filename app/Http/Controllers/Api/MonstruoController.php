<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monstruo;

class MonstruoController extends Controller
{
    public function index()
    {
        $Monstruos = Monstruo::all();
        return $Monstruos;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Monstruo = new Monstruo();
        $Monstruo->nombre = $request->nombre;
        $Monstruo->armadura = $request->armadura;
        $Monstruo->vida = $request->vida;
        $Monstruo->velocidad = $request->velocidad;
        $Monstruo->reto = $request->reto;
        $Monstruo->save();
        return $Monstruo;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Monstruo = Monstruo::find($id);
        return $Monstruo;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Monstruo = Monstruo::findOrFail($request->id);
        $Monstruo->nombre = $request->nombre;
        $Monstruo->armadura = $request->armadura;
        $Monstruo->vida = $request->vida;
        $Monstruo->velocidad = $request->velocidad;
        $Monstruo->reto = $request->reto;
        $Monstruo->save();
        return $Monstruo;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Monstruo = Monstruo::findOrFail($id);
        Monstruo::destroy($id);
        return $Monstruo;
    }
}
