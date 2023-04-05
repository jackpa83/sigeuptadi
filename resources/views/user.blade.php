@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Registro de Usuarios</h1>
    <!-- JavaScript Bundle with Popper -->

    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <script src="{{asset('vendor/sweetalert.js') }}"></script>
@stop
@section('content')
<div class="row">
</div>
<hr>
<!-- Button trigger modal -->

<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Marcas">
</button>

<a href="{{route('marcas.downloadPdf')}}" class="btn">
        <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Descargar Pdf"> 
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary"><b> Registrar Usuarios</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('user.store');}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nom_marca" name="names" required >
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" id="desc_marca" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>   
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="password2" name="password2" onblur ="verificar();" placeholder="" required >
            </div>
            <div class="col-md-12">
                    <label for="exampleInputPassword1" class="form-label">Rol de Usuario</label>    
                    <input type="text" class="form-control"name="name" id="name" required > 
                    <br>
            </div>
            <hr>
            <h4>Permisos del Rol</h4>
            <div class="col-md-12">
                @foreach ($permissions as $permissions)
                    <hr>   
                    <input class=" form-control form-check-input " name="permissions[]" type="checkbox" value="{{$permissions->id}}" id="flexCheckChecked" null>
                    <label for="">{{$permissions->name}}</label>
                    <br>
                @endforeach
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</script>
    <div class="row">
        <div class="col-12">
            <br><br>
        <table id="example" class="table display" style="width:100%" >
        <thead class="bg-primary">
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Email</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($user as $user)
            <tr>
                <td class="text-center">{{$user->id}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">
                    <a href="{{route('user.edit',$user->id)}}">
                        <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                <img src="../vendor/cp.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Editar Contraseña">
                        </button> 
                    </a>
                    <a href="{{route('user.edit',$user->id)}}">
                        <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                <img src="../vendor/editar.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Editar">
                        </button> 
                    </a>
                </td>   
            </tr>   
        @endforeach
        </tbody>
    
    </table>
   <br>
    <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
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
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                if (camp1.value.match(/[A-Z]/) == null ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'La Contraseña debe contener Letras Mayusculas y minisculas',
                        showConfirmButton: false,
                        timer: 1500
                    })  
                }
            }     
        }      
</script>
@if(Session::has('message'))
    <script type="text/javascript">
       Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario Registrado con Exito',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
@if(Session::has('update'))
    <script type="text/javascript">
       Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario Actulizado con Exito',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
<script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable(
                        {
        "language": {
            "lengthMenu": " Mostrar  _MENU_  Registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No se encuentran Registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            'search':"Buscar",
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
    }
                    );
        });
    </script> 
          
        </div>
    </div>
@stop
        

