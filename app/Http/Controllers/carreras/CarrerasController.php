<?php

namespace App\Http\Controllers\carreras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Carreras;
use App\Models\bitacora;
class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $carreras   = Carreras::All();
        return view('carreras/carreras')->with(compact( 'carreras',$carreras));
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
    public function store(Request $request){
       // $carreras   = Carreras::All();
        $carreras = new Carreras();
        $carreras->carrera= $request->post('carrera');
            if($carreras->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =   " A realizado un registro";
                $bitacora->modulo  =    "En la Tabla carrera";
                if ($bitacora->save()) {
                    return redirect()->route("carreras/carreras")->with("success","Carrera registrada con Exito");
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
       return $id;
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
