<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\bitacora;
use PDF;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marcas = Marca::All(); 
        return view('marcas')->with('marcas',$marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Hola";
    }
    public function downloadPdf()
    {
        $marcas = Marca::All();

       view()->share('marcas-pdf', $marcas);

        $pdf = PDF::loadView('marcas-pdf', ['marcas' =>$marcas]);
        return $pdf->download('users.pdf');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $marca = new Marca();
        $marca->nom_marca = $request->post('nom_marca');
        $marca->desc_marca = $request->post('desc_marca');
        
        if($marca->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =   "Registro";
            $bitacora->modulo  =    "Marcas";
            if ($bitacora->save()) {
                return redirect()->route("articulo")->with('message',"Registro Agregado con Exito");
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
        $marcas = Marca::findOrFail($id);
        return view('edit-marcas')->with(compact('marcas',$marcas));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
            $marcas = Marca::findOrFail($id);
            $marcas->nom_marca=$request->input('nom_marca');
            $request->input('nom_marca');
            $marcas->desc_marca=$request->input('desc_marca');

            if ($marcas->save()) {
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =   "Actualizo";
                $bitacora->modulo  =    "Marcas";
                if ($bitacora->save()) {
                    return redirect()->route("articulo")->with('update','Marca actualizada con Exito');
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
