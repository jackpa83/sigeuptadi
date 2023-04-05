<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienes;
use App\Models\Marca;
use App\Models\Categorias;
use App\Models\Espacio;
use App\Models\traslados;
use App\Models\bitacora;
use Barryvdh\DomPDF\Facade\Pdf;

class BienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas    = Marca::All();
        $categoria = Categorias::All();
        $bienes    = Bienes::All();
        $espacios  = Espacio::All();

        $bien = Bienes::select('bienes.id','bienes.num_bienes','bienes.modelo','bienes.estado_bien','bienes.serial_bien','marcas.nom_marca','categorias.nom_categoria','ubicaciones.ubicaciones') 
                ->join("marcas", "marcas_id", "=", "marcas.id")   
                ->join("categorias","categorias_id","=","categorias.id")
                ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
                ->get();
        return view('bienes')->with(compact( 'marcas','categoria','bienes','espacios','bien',$marcas,$categoria,$bienes,$espacios,$bien));
    }
    public function downloadPdf(){
        $bien = Bienes::select('bienes.id','bienes.num_bienes','bienes.modelo','bienes.serial_bien','marcas.nom_marca','categorias.nom_categoria','ubicaciones.ubicaciones') 
                ->join("marcas", "marcas_id", "=", "marcas.id")   
                ->join("categorias","categorias_id","=","categorias.id")
                ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
                ->get();
        view()->share('bienes-pdf',$bien  );
        $pdf = PDF::loadView('bienes-pdf', ['bien' =>$bien ]);
        return $pdf->download('Reporte.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $marcas    = Marca::All();
        $categoria = Categorias::All();
        $bienes    = Bienes::All();
        $espacios  = Espacio::All();

            $id = $request->post('n_bienes');
            $sn = $request->post('serial_bien');
                $bienes = bienes :: select("*")
                ->where('num_bienes',$id)
                ->get();
                $solicita = $bienes->count();
                $bien = bienes :: select("*")
                ->where('serial_bien',$sn)
                ->get();
                $serial = $bien->count();
                if ($solicita != 0 ||  $serial != 0 ) {
                    return redirect()->route("bienes")->with('success',"Numero de Bien o Serial (S/N) ya se Encuentra Registrado");
                }else{
                    $bienes = new Bienes();
                    $bienes->num_bienes = $request->post('n_bienes');
                    $bienes->modelo     = $request->post('modelo');
                    $bienes->marcas_id  = $request->post('marca_id');
                    $bienes->categorias_id = $request->post('categoria_id');
                    $bienes->ubicacion_id  = $request->post('ubicacion_id');   
                    $bienes->estado_bien   = "Activo";  
                    $bienes->serial_bien   = $request->post('serial_bien');
                    if ($bienes->save()) {
                            $bitacora = new bitacora();
                            $bitacora->usuario =  auth()->user()->name;
                            $bitacora->accion  =   "Registro";
                            $bitacora->modulo  =    "Bienes";
                            if ($bitacora->save()) {
                                return redirect()->route("bienes")->with('message',"Bien Registrado con Exito");
                            }
                    }
                    else{
                        return redirect()->route("bienes")->with("message","Error al Registrar Bien ");
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $marcas    = Marca::All();
        $categoria = Categorias::All();
        $bienes    = Bienes::All();
        $espacios  = Espacio::All();

        $bien = Bienes::select('bienes.id','bienes.marcas_id','bienes.num_bienes','bienes.serial_bien','ubicaciones.ubicaciones','bienes.categorias_id','bienes.ubicacion_id','bienes.estado_bien','marcas.nom_marca','categorias.nom_categoria','bienes.modelo')    
        ->join("marcas", "marcas_id", "=", "marcas.id")   
        ->join("categorias","categorias_id","=","categorias.id")
        ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
        ->where("bienes.id",$id)
        ->get();

       return view('edit-bienes')->with(compact( 'bien','marcas','categoria','espacios',$bien,$marcas,$categoria,$espacios));   

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
        $bienes = Bienes::findOrFail($id);

        $bienes->num_bienes = $request->post('n_bienes');
        $request->post('n_bienes');
        $bienes->modelo  = $request->post('modelo');
        $request->post('modelo');
        $bienes->marcas_id = $request->post('marca_id');
        $request->post('marca_id');
        $bienes->categorias_id = $request->post('categoria_id');
        $request->post('categoria_id');
        $bienes->ubicacion_id = $request->post('ubicacion_id');   
        $request->post('ubicacion_id');
        $bienes->estado_bien = $request->post('estado_bien');   
        $request->post('estado_bien');
        $bienes->serial_bien= $request->post('serial_bien');
        $request->post('serial_bien'); 
        if ($bienes->save()) {
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =   "Actualizo";
            $bitacora->modulo  =    "Bienes";
            if ($bitacora->save()) {
                return redirect()->route("bienes")->with('update',"Bien actualizado con Exito");
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
