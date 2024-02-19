<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\persona;

class discapacidadController extends Controller
{
    public function index()
    {
        $personasConDiscapacidad = persona::all();
        return $personasConDiscapacidad;
    }

    public function store(Request $request)
    {
        $discapacidad = new persona;
        $discapacidad->nombre = $request->nombre;
        $discapacidad->tipo = $request->tipo;
        $discapacidad->edad = $request->edad;
        $discapacidad->grado = $request->grado;
        $discapacidad->fecha = $request->fecha;
        $discapacidad->save();

        return $discapacidad;
    }

    public function show($id)
    {
        $discapacidad = persona::find($id);

        return $discapacidad;
    }

    public function update(Request $request, $id)
    {
        $discapacidad = persona::findOrFail($id);
        $discapacidad->nombre = $request->nombre;
        $discapacidad->tipo = $request->tipo;
        $discapacidad->edad = $request->edad;
        $discapacidad->grado = $request->grado;
        $discapacidad->fecha = $request->fecha;
        $discapacidad->save();

        return $discapacidad;
    }

    public function destroy($id)
    {
        $discapacidad = persona::findOrFail($id);
        persona::destroy($id);

        return $discapacidad;
    }
}
