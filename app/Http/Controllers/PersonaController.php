<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\User;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index')->with('personas', $personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->ci = $request->ci;
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->direccion = $request->direccion;
        $persona->fec_nac = $request->fec_nac;
        $persona->save();
        $persona = Persona::where('ci',$request->ci)->get()->last();
        $usuario = new User;
        $usuario->persona_id = $persona->id;
        $usuario->name = $request->nombres.'_'.$request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->route('persona.index')->with('mensaje', 'Se guardo correctamente');
        //return redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        //$usuario = $persona->user();
        //dd($persona);
        return view('personas.mostrar')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('personas.editar')->with('persona', $persona);
        //dd($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $persona = Persona::find($request->id);
        $usuario = $persona->user;
        $persona->direccion = $request->direccion;
        $persona->save();
        $usuario->email = $request->email;
        $usuario->save();
        return redirect(url('persona'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Persona::destroy($id);
        $persona = Persona::find($id);
        if ($persona->user) {
            return redirect(url('persona'))->with('eliminado', 'Fallo al eliminar');
        }
        else {
            $persona->delete();
            return redirect(url('persona'))->with('eliminado', 'Eliminado satisfactoriamente');
        }
    }
}
