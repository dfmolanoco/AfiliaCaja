<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliacion;

class AfiliacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Afiliacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "ndi" => ["required", "numeric"],
            "nombre" => ["required", "string"],
            "apellido" => ["required", "string"],
            "email" => ["required", "email", "unique:afiliaciones"],
            "genero" => ["required", "in:M,F"],
            "salario" => ["required", "numeric"]
        ]);

        $afiliacion = Afiliacion::create($request->all());

        return response()->json($afiliacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $afiliacion = Afiliacion::findOrFail($id);
        return response()->json($afiliacion);
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
        $afiliacion = Afiliacion::findOrFail($id);

        $afiliacion->aprobado = $request->get("aprobado");
        return $afiliacion->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
