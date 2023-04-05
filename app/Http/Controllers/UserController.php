<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\User;
use App\Models\roles;
use App\Models\bitacora;
use Illuminate\Http\Request;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $rol = roles::All();
        $user = Users::all();
        $roles = Roles::All();
        $permissions = Permission::All();
        return view('user')->with(compact('rol','user','permissions',$rol,$user,$permissions));   
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
        $role = Role::create(['name' => $request['name']]);
        // $role->permissions()->sync($request->permissions);
         
         if ($role->permissions()->sync($request->permissions)) {
            $bienes = User::create([
                'name'=>$request->post('names'),
               'email'=>$request->post('email'),
               'password'=>bcrypt($request->post('password'))
            ])->assignRole($request->post('name'));
             if($bienes->save()){
                 $bitacora = new bitacora();
                 $bitacora->usuario =  auth()->user()->name;
                 $bitacora->accion  =  "Registro";
                 $bitacora->modulo  =  "Usuarios";
                 if ($bitacora->save()) {
                     return redirect()->route("user")->with('message',"Usuario Registrado con Exito");
                 }
             }else{
                 return redirect()->route("user")->with("message","Error al Registrar Usuario ");
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
    public function roles($id)
    {
        $user =Users::findOrFail($id);
        $rol = roles::All();
        return view('roles-user',compact('rol','user',$rol,$user));
       return $rol;
    }
  
    public function edit($id)
    {
        $rol= Role::all();
        $user =User::findOrFail($id);
        return view('edit-user')->with(compact('rol','user',$rol,$user));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id){


        $user =Users::findOrFail($id);
        $user->name=$request->input('name');
        $request->input('name');
        $user->email=$request->input('email');
        $request->input('email');
        $user->password=bcrypt($request->input('password'));
        $request->input(bcrypt('password'));

        if( $user->save()){
            $bitacora = new bitacora();
            $bitacora->usuario =  auth()->user()->name;
            $bitacora->accion  =  "Registro";
            $bitacora->modulo  =  "Usuarios";
            if ($bitacora->save()) {
                return redirect()->route("user")->with("update","Usuario Actualizado con Exito");
            }else{
                return redirect()->route("user")->with("message","Error al Registrar Usuario ");
            }
        }
        
    }
    public function updat(Request $request, User $user){

        $user =Users::findOrFail($user);
        $user->roles()->sync([$request->rol]); 
        return redirect()->route("user")->with("roles","Role Asignado con Exito");
    

   // $user->roles()->sync([$request->roles]); 
     //  $user[]=  $request->input('roles');
       
     //   return $user[0];
    //   if ($var) {
      //      return redirect()->route("user")->with("roles","Role Asignado con Exito");
       //} 
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
