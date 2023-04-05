<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitantes;
use App\Models\Prestamos;
use App\Models\Espacio;
use App\Models\Bienes;
use App\Models\bitacora;
use Carbon\Carbon;
use PDF;
class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamos::select('prestamos.id','prestamos.num_bienes','solicitantes.cedula','solicitantes.nombre','solicitantes.apellido','solicitantes.carr_dpto','solicitantes.tipo_usuario','prestamos.fecha_entrega','prestamos.fecha_prestamos','prestamos.estatus_prestamo')    
            ->join("solicitantes", "solicitante_id", "=", "solicitantes.id")   
            ->get();

        return view('prestamos',compact('prestamos',$prestamos));
    }
    public function downloadPdf()
    {
        $prestamos = Prestamos::select("*")    
            ->join("solicitantes", "solicitante_id", "=", "solicitantes.id")   
            ->get();
        view()->share('ubicaciones-pdf',$prestamos);
        $pdf = PDF::loadView('prestamos-pdf', ['prestamos' =>$prestamos]);
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
        $prest = new Prestamos();

        $id = $request->post('solicitante_id'); 
        $bien = Prestamos::select('*')    
        ->where('solicitante_id',$id)
        ->where('estatus_prestamo','Activo')
        ->get();
        $solicita = $bien->count();

        if ($solicita == 0) {
        $prest->solicitante_id    = $request->post('solicitante_id');
        $prest->num_bienes        = $request->post('num_bienes');
        $prest->fecha_prestamos   = Carbon::parse($request->post('fec_prestamo'))->format('d-m-Y'); 
        $prest->fecha_entrega     = Carbon::parse($request->post('fec_entrega'))->format('d-m-Y');
        $prest->estatus_prestamo  = "Activo";     

        if($prest->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Prestamos";
            if ($bitacora->save()) {
                return redirect()->route("prestamos")->with("message","Prestamos Registrado con Exito");
            }
        }
        }else{
            $solicitante = Solicitantes::All();
                    return redirect()->route("prestamos")->with('notifi',"Solicitante no Registrado registrelo e intente de nuevo");
           // return view('solicitante')->with(compact( 'solicitante',$solicitante));
        }       
    }
 public function buscar(Request $request){  
        $espacios  = Espacio::All();
        $solicitantes = solicitantes::All();
               $id = $request->post('buscar');   
             $bien = Bienes::select('bienes.id','bienes.marcas_id','bienes.num_bienes','ubicaciones.ubicaciones','bienes.categorias_id','bienes.ubicacion_id','marcas.nom_marca','categorias.nom_categoria','bienes.modelo')    
                ->join("marcas", "marcas_id", "=", "marcas.id")   
                ->join("categorias","categorias_id","=","categorias.id")
                ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
                ->where('bienes.num_bienes',$id)
                ->get();
            $solicitante = solicitantes :: select("*")
                ->where('cedula',$id)
                ->get();
            $solicita = $solicitante->count();
                if ($solicita != 0) {
                    return view('generar-prestamos')->with(compact('bien','espacios','solicitante',$bien,$espacios,$solicitante));
                }else{
                    $solicitante = Solicitantes::All();
                            return redirect()->route("prestamos")->with('register',"Solicitante no Registrado registrelo e intente de nuevo");
                   // return view('solicitante')->with(compact( 'solicitante',$solicitante));
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
    public function edit ($id){
       // $prestamos = Prestamos::select("*")    
         //   ->join("solicitantes", "solicitante_id", "=", "solicitantes.id")
          //  ->where('prestamos.id',$id)    
         //   ->get();
         //   return $prestamos;
           // return view('edit-prestamos')->with(compact('prestamos', $prestamos));
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
        $prestamos = Prestamos::findOrFail($id);
        $prestamos->estatus_prestamo = "Cerrado";
        if($prestamos->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =   "Prestamos Cerrado con Exito";
            $bitacora->modulo  =    "Prestamos";
            if ($bitacora->save()) {
                return redirect()->route("prestamos")->with("update","Registro Agregado con Exito");
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
