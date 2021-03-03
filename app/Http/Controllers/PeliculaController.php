<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Pelicula;
use App\Idioma;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peliculas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::select('id', 'nombres', 'apellidos')->orderBy('apellidos')->get();
        $actores = array();
        foreach ($personas as $persona) {
            $actores[$persona->id] = $persona->apellidos.' '.$persona->nombres;
        }
        $idiomas = Idioma::all();
        return view('peliculas.nuevo')->with('datos', ['personas'=>$actores, 'idiomas'=>$idiomas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula;
        $pelicula->titulo = $request->titulo;
        $pelicula->clasificacion = $request->clasificacion;
        $pelicula->genero = $request->genero;
        $pelicula->duracion = $request->duracion;
        $pelicula->estreno = $request->estreno;
        $pelicula->idioma_id = $request->idioma_id;
        $pelicula->save();
        $pelicula = Pelicula::where('titulo', $request->titulo)->orderBy('created_at')->get()->last();
        foreach ($request->persona_id as $id)
            $pelicula->personas()->attach($id, ['created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->route('peli.index')->with('mensaje', 'Pelicula creadad satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
