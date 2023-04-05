<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitantes;
use App\Models\bitacora;

class SolicitantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitante = Solicitantes::All();
        return view('solicitante')->with(compact('solicitante',$solicitante));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitante = new Solicitantes();
        $solicitante->nombre    = $request->post('nombre');
        $solicitante->apellido  = $request->post('apellido');
        $solicitante->cedula    = $request->post('cedula');
        $solicitante->tipo_usuario = $request->post('tipo_usuario');
        $solicitante->carr_dpto = $request->post('carr_dpto');
        $solicitante->telefono  = $request->post('telefono');
        $solicitante->email     = $request->post('email');
        
        if($solicitante->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Solicitantes";
            if ($bitacora->save()) {
                return redirect()->route("solicitante")->with('message',"Solictante  Registrado con Exito");
            }
        }
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
        $solicitante = Solicitantes::findOrFail($id);
        //return $edit_marca;    
        return view('edit-solicitante')->with(compact('solicitante',$solicitante));    
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
        $solicitante = Solicitantes::findOrFail($id);
        
        $solicitante->nombre    = $request->post('nombre');
        $solicitante->apellido  = $request->post('apellido');
        $solicitante->cedula    = $request->post('cedula');
        $solicitante->tipo_usuario = $request->post('tipo_usuario');
        $solicitante->carr_dpto = $request->post('carr_dpto');
        $solicitante->telefono  = $request->post('telefono');
        $solicitante->email     = $request->post('email');

        if($solicitante->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Solicitantes";
            if ($bitacora->save()) {
                return redirect()->route("solicitante")->with("update","Registro Actualizado con Exito");
            }
        }
   
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
