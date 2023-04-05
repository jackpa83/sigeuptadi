@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Asignacion de Bienes</h1>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="row">
</div>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Solicitante
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">Asignacion de Bienes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('solicitante.store');}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cedula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tipo de Solicitante</label>
        <select name="tipo_usuario" id="tipo_usuario" class="form-control">
            <option value="Administrativo">Administrativo</option>
            <option value="Obrero">Obrero</option>
            <option value="Estudiante">Estudiante</option>
            <option value="Docente">Docente</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Carrera o Departamento</label>
        <select name="carr_dpto" id="carr_dpto" class="form-control">
            <option value="Administrativo">Administrativo</option>
            <option value="Obrero">Obrero</option>
            <option value="Estudiante">Estudiante</option>
            <option value="Docente">Docente</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" >
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
<script type="text/javascript">
    $(document).ready(function () {     
    $('#example').DataTable();
});
</script>
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
       
        </tbody>
        <tfoot >
            <tr >
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
        </tfoot>
        <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
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
        

