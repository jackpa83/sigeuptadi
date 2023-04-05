<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienes;
use App\Models\Espacio;
use App\Models\Traspasos;
use App\Models\bitacora;
use PDF;
use DB;
class TraspasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $espacios  = Espacio::All();
        $bienes    = Bienes::All();
        $traspasos = Traspasos::select('traspasos.id','bienes.num_bienes','espacios.nom_espacio')    
        ->join("bienes", "bien_id", "=", "bienes.id")   
        ->join("espacios","espacios_id","=","espacios.id")
        ->get();
        return view('traspasos')->with(compact('traspasos','bienes','espacios',$traspasos,$bienes,$espacios));
    }
    public function buscar(Request $request){     
        $espacios  = Espacio::All();
        $id = $request->post('buscar');   
        $bienes = bienes :: select("*")
        ->where('num_bienes',$id)
        ->get();
        $solicita = $bienes->count();
        if ($solicita != 0) {
            return view('generar_traspasos')->with(compact('espacios',$espacios));
        }   
            
            
            
           
            

         //  return redirect()->route("marcas")->with('success',"Numero de Bien o Serial (S/N) ya se Encuentra Registrado");
            else{
/*
            $bien = Bienes::select('bienes.id','bienes.marcas_id','bienes.num_bienes','ubicaciones.ubicaciones','bienes.categorias_id','bienes.ubicacion_id','marcas.nom_marca','categorias.nom_categoria','bienes.modelo')    
            ->join("marcas", "marcas_id", "=", "marcas.id")   
            ->join("categorias","categorias_id","=","categorias.id")
            ->join("ubicaciones", "ubicacion_id", "=", "ubicaciones.id")
            ->where('bienes.num_bienes',$id)
            ->get();


            return view('generar_traspasos')->with(compact('bien','espacios',$bien,$espacios));
*/
            }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $traspasos= new Traspasos();
        $traspasos->bien_id   = $request->post('bienes_id');
        $traspasos->espacios_id = $request->post('espacios_id');

        if($traspasos->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Traspaso";
            if ($bitacora->save()) {
                return redirect()->route("traspasos")->with('message',"Traspaso registado con Exito");
            }
        }else{
            return redirect()->route("traspasos")->with('message',"Error al registrar trapaso");
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $espacios  = Espacio::All();
        $bienes    = Bienes::All();
        $traspasos = Traspasos::select('*')    
            ->join("bienes", "bien_id", "=", "bienes.id")   
            ->join("espacios","espacios_id","=","espacios.id")
            ->join("marcas","marcas_id","=","marcas.id")
            ->where('traspasos.id',$id) 
            ->get();
        return view('generar_traspasos')->with(compact('traspasos','bienes','espacios',$traspasos,$bienes,$espacios));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request,$id){
                $traspasos = Traspasos::findOrFail($id);
                $traspasos->espacios_id =$request->input('espacios_id ');
                $request->input('espacios_id ');

                if($traspasos->save()){
                    $bitacora = new bitacora();
                    $bitacora->usuario =  auth()->user()->name;
                    $bitacora->accion  =  "Actualizo";
                    $bitacora->modulo  =  "Traspaso";
                    if ($bitacora->save()) {
                        return redirect()->route("traspasos")->with('update',"Traspaso registado con Exito");
                    }
                }else{
                    return view('generar_traspasos')->with(compact('traspasos','bienes','espacios',$traspasos,$bienes,$espacios));
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
