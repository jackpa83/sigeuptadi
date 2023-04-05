<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ubicaciones;
use App\Models\bitacora;
use PDF;
class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacion= Ubicaciones::All();
        return view('ubicaciones')->with(compact( 'ubicacion',$ubicacion));

    }
    public function downloadPdf()
    {
        $ubicacion= Ubicaciones::All();
        view()->share('ubicaciones-pdf',$ubicacion);
        $pdf = PDF::loadView('ubicaciones-pdf', ['ubicacion' =>$ubicacion]);
        return $pdf->download('Reporte.pdf');
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
        $ubicacion = new Ubicaciones();
        $ubicacion->ubicaciones    = $request->post('ubicacion');
        $ubicacion->desc_ubicaciones = $request->post('desc_ubicacion');

        if($ubicacion->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Ubicaciones";
            if ($bitacora->save()) {
                return redirect()->route("ubicacion")->with("success","Ubicacion Registra  con Exito");
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
        $ubicaciones = Ubicaciones::findOrFail($id);
        $ubicacion= ubicaciones::All(); 
        return view('edit-ubicacion')->with(compact('ubicaciones','ubicacion',$ubicaciones,$ubicacion)) ;    
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
            $ubicacion = Ubicaciones::findOrFail($id);
            $ubicacion->ubicaciones    = $request->post('ubicacion');
            $ubicacion->desc_ubicaciones = $request->post('desc_ubicacion');
    
            if($ubicacion->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =  "Actualizo";
                $bitacora->modulo  =  "Ubicaciones";
                if ($bitacora->save()) {
                    return redirect()->route("ubicacion")->with("update","Registro Actualizado con Exito");
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
