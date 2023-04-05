<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienes;
use App\Models\Marca;
use App\Models\Categorias;
use App\Models\Espacio;
use App\Models\solicitantes;
use App\Models\traslados;
use App\Models\Prestamos;
use App\Models\incidencias;
use App\Models\ubicaciones;
use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class estadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request){

        $marcas    = Marca::All();
        $categoria = Categorias::All();
        $bienes    = Bienes::All();
        $espacios  = Espacio::All();
        $solicitantes = Solicitantes::All();
        $ubicaciones = Ubicaciones::All();
        $pres = Prestamos::All();
        $incidencias = Incidencias::All();

        /*Graficos incidencias*/

            $est_incidencia = Incidencias::select("*")    
            ->where("est_incidencia","=", "Activa")  
            ->get();
            $no_resuelta = Incidencias::select("*")    
            ->where("est_incidencia","=", "Resuelta")     
            ->get();
            $n_proceso = Incidencias::select("*")
            ->where("est_incidencia","=", "En Proceso")        
            ->get();

        /*Graficos incidencias*/
     
        
            $ins_activa = Incidencias::select("*")
            ->where("est_incidencia","=", "En Proceso")        
            ->get();

            
            $est_bienes = Incidencias::select("*")    
            ->where("est_incidencia","=", "Activa") 
            ->where("t_incidencia","=", "Bienes")      
            ->get();
            $est_bienes_no = Incidencias::select("*")    
            ->where("est_incidencia","=", "Resuelta")
            ->where("t_incidencia","=", "Bienes")      
            ->get();

            $est_incidencia = $est_incidencia->count();
            $no_resuelta = $no_resuelta->count();
            $est_bienes = $est_bienes->count();
            $est_bienes_no = $est_bienes_no->count();
            $n_proceso= $n_proceso->count();

            $incidencias = $incidencias->count();
            $pres = $pres->count();
            $espa = $espacios->count();
            $soli = $solicitantes->count();
            $elements = $bienes->count();
  
        return view('estadisticas')->with(compact('bienes','elements','soli','espa','pres','categoria','incidencias','ubicaciones','est_incidencia','no_resuelta','est_bienes','est_bienes_no','n_proceso',$bienes,$soli,$espa,$pres,$categoria,$incidencias,$ubicaciones,$est_incidencia,$no_resuelta,$est_bienes,$est_bienes_no,$n_proceso));
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
    public function buscar(request $request){
        $marcas    = Marca::All();
        $categoria = Categorias::All();
        $bienes    = Bienes::All();
        $espacios  = Espacio::All();
        $solicitantes = Solicitantes::All();
        $ubicaciones = Ubicaciones::All();
        $pres = Prestamos::All();
        $incidencias = Incidencias::All();  

        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $desd  = Carbon::parse($request->post('desde'))->format('d-m-Y');
        $hast  = Carbon::parse($request->post('hasta'))->format('d-m-Y');

        $incidencias = Incidencias::select("*")    
            ->whereBetween('fecha_incidencia', [$desd, $hast])     
            ->get();
            $incidencias = $incidencias->count();
        $inm_inci = Incidencias::select("*")    
            ->whereBetween('fecha_incidencia', [$desd, $hast])  
            ->where("t_incidencia","=","Inmueble")   
            ->get();
            $inm_inci = $inm_inci->count();   
        $inm_mue = Incidencias::select("*")    
            ->whereBetween('fecha_incidencia', [$desd, $hast])  
            ->where("t_incidencia","=","Bienes")   
            ->get();
            $inm_mue = $inm_mue->count();    
        $fech_prest = Prestamos::select("*")    
            ->whereBetween('fecha_prestamos', [$desd, $hast])  
            ->get();
            $fech_prest  = $fech_prest ->count();
        $fech_prest_act = Prestamos::select("*")    
            ->whereBetween('fecha_prestamos', [$desd, $hast])
            ->where("estatus_prestamo","=","Activo")   
            ->get();
            $fech_prest_act  =  $fech_prest_act ->count();  
        $fech_prest_cerr = Prestamos::select("*")    
            ->whereBetween('fecha_prestamos', [$desd, $hast])
            ->where("estatus_prestamo","=","Cerrado")   
            ->get();
            $fech_prest_cerr  = $fech_prest_cerr ->count();  
/***************************************************************************** */
/*Graficos incidencias*/

$est_incidencia = Incidencias::select("*")    
->where("est_incidencia","=", "Activa")  
->get();
$no_resuelta = Incidencias::select("*")    
->where("est_incidencia","=", "Resuelta")     
->get();
$n_proceso = Incidencias::select("*")
->where("est_incidencia","=", "En Proceso")        
->get();

/*Graficos incidencias*/


$ins_activa = Incidencias::select("*")
->where("est_incidencia","=", "En Proceso")        
->get();


$est_bienes = Incidencias::select("*")    
->where("est_incidencia","=", "Activa") 
->where("t_incidencia","=", "Bienes")      
->get();
$est_bienes_no = Incidencias::select("*")    
->where("est_incidencia","=", "Resuelta")
->where("t_incidencia","=", "Bienes")      
->get();

$est_incidencia = $est_incidencia->count();
$no_resuelta = $no_resuelta->count();
$est_bienes = $est_bienes->count();
$est_bienes_no = $est_bienes_no->count();
$n_proceso= $n_proceso->count();

$pres = $pres->count();
$espa = $espacios->count();
$soli = $solicitantes->count();
$elements = $bienes->count();
/***************************************************************************** */
            //return $hast;
        return view('estadisticas-detalladas')->with(compact('incidencias','inm_inci','inm_mue','fech_prest','fech_prest_act','fech_prest_cerr','bienes','elements','soli','espa','pres','categoria','incidencias','ubicaciones','est_incidencia','no_resuelta','est_bienes','est_bienes_no','n_proceso',$fech_prest_act,$fech_prest,$incidencias,$inm_inci,$inm_mue,$fech_prest_cerr,$bienes,$soli,$espa,$pres,$categoria,$incidencias,$ubicaciones,$est_incidencia,$no_resuelta,$est_bienes,$est_bienes_no,$n_proceso));
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
