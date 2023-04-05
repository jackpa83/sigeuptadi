<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\bitacora;
use PDF;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::All();
        return view('categorias')->with('categorias',$categorias);
    }
    public function downloadPdf()
    {
        $categorias = Categorias::All();
        view()->share('categorias-pdf', $categorias);
        $pdf = PDF::loadView('categorias-pdf', ['categorias' =>$categorias]);
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
            $categorias = new Categorias();
            $categorias->nom_categoria = $request->post('nom_categoria');
            if($categorias->save()){
                $bitacora = new bitacora();
                $bitacora->usuario =  auth()->user()->name;
                $bitacora->accion  =   "Registro";
                $bitacora->modulo  =    "Categoria";
                if ($bitacora->save()) {
                    return redirect()->route("categorias")->with("success","Categoria registrada con Exito");
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
        $categorias =Categorias::findOrFail($id);
        return view('edit-categorias')->with(compact('categorias',$categorias));     
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
        $categorias = Categorias::findOrFail($id);
        $categorias->nom_categoria=$request->input('nom_categoria');
        $request->input('nom_categoria');
        if($categorias->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =   "Registro";
            $bitacora->modulo  =    "Categoria";
            if ($bitacora->save()) {
                return redirect()->route("categorias")->with("update","Registro Agregado con Exito");
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
