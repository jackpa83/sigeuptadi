@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuario</h1>
    <hr>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
@stop
@section('content')
<div class="container-fluid">
<div class="row">
  
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br><br>
    <form action="{{route('user.update',$user->id)}}" method="POST">   
    @csrf
    @method('PUT')
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
        </div>

        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="password2" name="password2" onblur ="verificar();" placeholder="" required >
        </div>
        <button type="submit" class="btn btn-primary" >Actualizar</button>
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
        

