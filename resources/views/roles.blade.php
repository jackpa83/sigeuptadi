@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Roles y Permisos</h1>
    <hr>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <script src="{{asset('vendor/sweetalert.js') }}"></script>
  
@stop
@section('content')
<div class="container-fluid">
<div class="row">
  
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br><br>
    <form action="{{route('roles.store');}}" method="POST">   
            @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Rol de Usuario</label>    
                    <input type="text" class="form-control"name="name" id="name" required > 
                </div>
        <hr>
        <h4>Permisos del Rol</h4>
        <hr>
            <div class="form-check">
                @foreach ($permissions as $permissions)
                    <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permissions->id}}" id="flexCheckChecked" null>
                    <label for="">{{$permissions->name}}</label>
                    <br>
                @endforeach
            </div>
        <button type="submit" class="btn btn-primary" >Crear</button>
    </form>
    </div>
    </div>
</div>
</div>
<script>
        function verificar(){
            var camp1= document.getElementById('password');
            var camp2= document.getElementById('password2');

            
            if (camp1.value != camp2.value) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'La Contraseña coninciden',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                if (camp1.value.length < 8) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'La Contraseña no puede ser menor a 8 Caracteres',
                        showConfirmButton: false,
                        timer: 1500
                    })    
                }
                if (camp1.value.match(/[a-z]/) == null ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'La Contraseña debe contener Letras Mayusculas y minisculas',
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
                if (camp1.value.match(/[A-Z]/) == null ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'La Contraseña debe contener Letras Mayusculas y minisculas',
                        showConfirmButton: true,
                        timer: 1500
                    })  
                }
            }     
        }      
</script>

<hr>
        </div>
    </div>
@stop
        

