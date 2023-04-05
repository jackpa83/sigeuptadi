<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\incidencias;
    use App\Models\Espacio;
    use App\Models\Bienes;
    use Illuminate\Http\File;
    use App\Models\bitacora;
    use Carbon\Carbon;
    use PDF;
class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacios = Espacio::All();
        $bienes = Bienes::All();
        $incidencias= Incidencias::All();
        $incidencia = Incidencias::select("*")    
            ->join("espacios", "incidencias.nom_espacio", "=", "espacios.id")
            ->join("bienes", "incidencias.cod_bienes", "=", "bienes.id")    
            ->get();
        return view('Incidencias')->with(compact( 'incidencia','espacios','bienes',$incidencia,$espacios,$bienes));
    }
    public function downloadPdf()
    {
        $incidencias = Incidencias::select("*")    
        ->join("espacios", "incidencias.nom_espacio", "=", "espacios.id") 
        ->join("bienes", "incidencias.cod_bienes", "=", "bienes.id")    
        ->get();
        view()->share('incidencias-pdf',$incidencias );
        $pdf = PDF::loadView('incidencias-pdf', ['incidencias' =>$incidencias]);
        return $pdf->download('Reporte.pdf');
    }
    public function incidenciaPdf($id){
        $espacios = Espacio::All();
        $incidencia = Incidencias::select("*")    
            ->join("espacios", "incidencias.nom_espacio", "=", "espacios.id")
            ->join("bienes", "incidencias.cod_bienes", "=", "bienes.id")  
            ->where('incidencias.id',$id)   
            ->get();
        view()->share('incidencias-pdf',$incidencia );
        $pdf = PDF::loadView('detallado-pdf', ['incidencias' =>$incidencia]);
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
        $incidencia = new Incidencias();
        if($request->hasFile('img')){
               $file = $request->file('img');
            $destino = 'imagenes/incidencias/';
            $nombre  = time().'-'.$file->getClientOriginalName();
            $uploadfile = $request->file('img')->move($destino,$nombre);
            $incidencia->img = $destino.$nombre;
        }

        $incidencia->t_incidencia     = $request->post('t_incidencia');
        $incidencia->cod_bienes       = $request->post('cod_bienes');
        $incidencia->descripcion      = $request->post('descripcion');
        $incidencia->fecha_incidencia = Carbon::parse($request->post('fecha_incidencia'))->format('d-m-Y');
        $incidencia->nom_espacio      = $request->post('nom_espacio'); 
        $incidencia->est_incidencia   = "Activa";
        $incidencia->solventado_por   = " ";
        $incidencia->fecha_solucion   = Carbon::parse($request->post('fecha_solucion'))->format('d-m-Y');
        $incidencia->registrado_por   = $request->post('registrado_por');


            if($incidencia->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =  "Registro";
                $bitacora->modulo  =  "Incidencias";
                if ($bitacora->save()) {
                    return redirect()->route("incidencia")->with("success","Registro Agregado con Exito");
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
        $espacios = Espacio::All();
        $incidencia = Incidencias::select("*")    
            ->join("espacios", "incidencias.nom_espacio", "=", "espacios.id")
            ->join("bienes", "incidencias.cod_bienes", "=", "bienes.id")  
            ->where('incidencias.id',$id)   
            ->get();
        return view('edit-incidencia')->with(compact( 'incidencia','espacios',$incidencia,$espacios));
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
        $incidencia = Incidencias::findOrFail($id);
        $incidencia->descripcion=$request->input('descripcion');
        $request->input('descripcion');
        $incidencia->est_incidencia =$request->input('est_incidencia');
        $request->input('est_incidencia');
        $incidencia->solventado_por=$request->input('solventado_por');
        $request->input('solventado_por');
        $incidencia->fecha_solucion =Carbon::parse($request->post('fecha_solucion'))->format('d-m-Y');
        Carbon::parse($request->post('fecha_solucion'))->format('d-m-Y');
        $incidencia->registrado_por =$request->input('registrado_por');
        $request->input('registrado_por');


        if($incidencia->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =   "Actualizo";
            $bitacora->modulo  =    "Incidencias";
            if ($incidencia->save()) {
                return redirect()->route("incidencia")->with("update","Registro Actualizado con Exito");
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
