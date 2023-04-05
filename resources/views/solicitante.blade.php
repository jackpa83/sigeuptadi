@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Solicitantes</h1>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <script src="{{asset('vendor/sweetalert.js') }}"></script>
@stop
@section('content')
<div class="row">
</div>
<hr>
<!-- Button trigger modal -->
@can('solicitantes.store')

<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Solicitantes">
</button>
@endcan
<a href="{{route('ubicaciones.downloadPdf')}}" class="btn">
    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40"  data-toggle="tooltip" data-placement="left" title="Descargar Pdf"> 
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">Registrar Solicitantes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('solicitante.store');}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputEmail1" class="form-label">Cedula</label>
            <input type="number " class="form-control" id="cedula" name="cedula" required >
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required >
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required >
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Tipo de Solicitante</label>
            <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                <option value="Administrativo">Administrativo</option>
                <option value="Obrero">Obrero</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Docente">Docente</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1" class="form-label">Carrera o Departamento</label>
            <select name="carr_dpto" id="carr_dpto" class="form-control">
                <option value="Administración y contaduría">Administración y contaduría</option>
                <option value="Mecánica">Mecánica</option>
                <option value="Informática">Informática</option>
                <option value="Gestión y calidad de Ambiente">Gestión y calidad de Ambiente</option>
                <option value="Ciencias Básicas">Ciencias Básicas</option>
                <option value="Transporte">Transporte</option>
                <option value="Electricidad">Electricidad</option>
                <option value="Postgrado">Postgrado</option>
                <option value="Estudios Generales">Estudios Generales</option>
                <option value="Extensión Universitaria">Extensión Universitaria</option>
                <option value="Vinculación Social">Vinculación Social</option>
                <option value="Caja">Caja</option>
                <option value="Compras">Compras</option>
                <option value="RRHH">RRHH</option>
                <option value="Creación Intelectual">Creación Intelectual</option>
                <option value="Sistemas">Sistemas</option>
                <option value="Pasantías">Pasantías</option>
                <option value="DACE">DACE</option>
                <option value="MEPSU">MEPSU</option>
                <option value="Deportes">Deportes</option>
 
            </select>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono"  required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"  required>
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

    <div class="row">
        <div class="col-12">
            <br><br>
            <table id="example" class="table display" style="width:100%" >
        <thead class="bg-primary">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Tipo de usuario</th>
                <th>Carrera o dpto</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitante as $solicitante)
                <tr>
                    <td>{{$solicitante->id}}</td>
                    <td>{{$solicitante->nombre}}</td>
                    <td>{{$solicitante->apellido}}</td>
                    <td>{{$solicitante->cedula}}</td>
                    <td>{{$solicitante->tipo_usuario}}</td>
                    <td>{{$solicitante->carr_dpto}}</td>
                    <td>{{$solicitante->telefono}}</td>
                    <td>{{$solicitante->email}}</td>
                    <td>
                    @can('solicitante.edit')
                        <a href="{{route('solicitante.edit',$solicitante->id)}}">
                            <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                    <img src="../vendor/editar.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Editar">
                            </button> 
                        </a>
                    @endcan
                    </td>
                </tr>   
            @endforeach
        </tbody>

    <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
   
        @if(Session::has('message'))
            <script type="text/javascript">
                toastr.options = {
                    "progressBar":true,
                }
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Solicitante registrado con Exito!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif

        @if(Session::has('register'))
            <script type="text/javascript">
                toastr.options = {
                    "progressBar":true,
                }
                toastr.warning("{{ Session::get('register')}}");
            </script>
        @endif
        @if(Session::has('update'))
            <script type="text/javascript">
                toastr.options = {
                    "progressBar":true,
                }
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Solicitante Actualizado con Exito!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif
            <script type="text/javascript">
               
                    $(document).ready(function () {
                        responsive:true;
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
        

