<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']= Usuario::paginate(5);
        return view('usuario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // $datosUsuario = request()->all();


       $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'TipoIdent'=>'required|string|max:100',
            'NIdent'=>'required|string|max:100',
            'Fecha'=>'required|date|max:100',
            'contraseña'=>'required|string|max:100',

       ];

       $mensaje=[

            'required'=>'El :attribute es requerido',


       ];

       $this->validate($request, $campos,$mensaje);
       $datosUsuario = request()->except('_token');


       Usuario::insert($datosUsuario);

       // return response()->json($datosUsuario);
       return redirect('usuario')->with('mensaje','usuario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit',compact('usuario') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'TipoIdent'=>'required|string|max:100',
            'NIdent'=>'required|string|max:100',
            'Fecha'=>'required|date|max:100',
            'contraseña'=>'required|string|max:100',

       ];

       $mensaje=[

            'required'=>'El :attribute es requerido',


       ];

       $this->validate($request, $campos,$mensaje);

        $datosUsuario = request()->except(['_token','_method']);
        Usuario::where('id','=',$id)->update($datosUsuario);

        $usuario=Usuario::findOrFail($id);
        //return view('usuario.edit',compact('usuario') );
        return redirect('usuario')->with('mensaje','usuario borrado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);


        return redirect('usuario')->with('mensaje','usuario borrado');

    }
}
