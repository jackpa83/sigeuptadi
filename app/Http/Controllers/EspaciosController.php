<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Espacio;
use App\Models\Estatu;
use App\Models\ubicaciones;
use App\Models\estado;
use App\Models\bitacora;
use Barryvdh\DomPDF\Facade\Pdf;

class EspaciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //$espacios= Espacio::All();

            $ubicacion= ubicaciones::All(); 
            $estatus= Estatu::All();
            $estado= Estado::All();  

            $espacios = Espacio::select("*")
                ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
                ->join("estatus", "estatus_id", "=", "estatus.id")   
                ->join("estados","estados_id","=","estados.id")
                ->get();
            return view('espacios')->with(compact('espacios','ubicacion','estatus','estado',$espacios,$ubicacion,$estatus,$estado));
    }
    public function downloadPdf(){
        $espacios = Espacio::select("*")
                ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
                ->join("estatus", "estatus_id", "=", "estatus.id")   
                ->join("estados","estados_id","=","estados.id")
                ->get();
        view()->share('espacios-pdf',$espacios  );
        $pdf = PDF::loadView('espacios-pdf', ['espacios' =>$espacios ]);
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
            $espacio = new Espacio();
            $espacio->nom_espacio  = $request->post('nom_espacio');
            $espacio->ubicacion_id = $request->post('ubicacion');
            $espacio->estatus_id   = $request->post('estatus');
            $espacio->estados_id   = $request->post('estado');
            $espacio->desc_espacio = $request->post('desc_espacio');
            if($espacio->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =   "Registro";
                $bitacora->modulo  =    "Espacios";
                if ($bitacora->save()) {
                    return redirect()->route("espacio")->with("message","Registro Agregado con Exito");
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
       $espacios = Espacio::findOrFail($id);
        $ubicacion = ubicaciones::All(); 
        $estatus   = Estatu::All();
        $estado    = Estado::All();  


       $espacio = Espacio::select("*")
                ->join("ubicaciones", "espacios.ubicacion_id", "=", "ubicaciones.id")
                ->join("estatus", "espacios.estatus_id", "=", "estatus.id")   
                ->join("estados","espacios.estados_id","=","estados.id")
                ->where("espacios.id","=",$id)
                ->get();
        
        return view('edit-espacios')->with(compact('espacios','ubicacion','estatus','estado',$espacio,$ubicacion,$estatus,$estado)) ;    
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
            $espacios = Espacio::findOrFail($id);
            $espacios->nom_espacio  = $request->post('nom_espacio');
            $espacios->ubicacion_id = $request->post('ubicacion');
            $espacios->estatus_id   = $request->post('estatus');
            $espacios->estados_id   = $request->post('estado');
            $espacios->desc_espacio = $request->post('desc_espacio');  
            if($espacios->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =   "Actualizo";
                $bitacora->modulo  =    "Espacios";
                if ($bitacora->save()) {
                    return redirect()->route("espacio")->with("message","Registro Agregado con Exito");
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
