@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Incidencias</h1>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
<link href="{{asset('css/toastr.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="row">
</div>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Incidencias
</button>
<a href="{{route('incidencias.downloadPdf')}}" class="btn btn-danger"> PDF </a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">Registrar Incidencias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('incidencias.store');}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Nombre Espacio</label>
                    <select name="nom_espacio" id="nom_espacio" class="form-control">
                        @foreach ($espacios as $espacios)
                        <option value="{{$espacios->id}}">{{$espacios->nom_espacio}}</option>
                        @endforeach   
                    </select>
                </div>
        <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Nombre Espacio</label>
                    <select name="nom_espacio" id="nom_espacio" class="form-control">
                        @foreach ($espacios as $espacios)
                        <option value="{{$espacios->id}}">{{$espacios->nom_espacio}}</option>
                        @endforeach   
                    </select>
                </div>
        </div>
          <div class="row">
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Código de bienes</label>
                      <input type="text" class="form-control" id="cod_bienes" name="cod_bienes" >
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Fecha de la Incidencia</label>
                      <input type="date" class="form-control" id="fecha_incidencia" name="fecha_incidencia" >
                </div>

          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputEmail1" class="form-label">Descripción de la Incidencia</label>
                  <textarea name="descripcion" id="" cols="20" rows="5" id="descripcion" class="form-control"></textarea>
                </div>
          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" id="img" name="img">
                      <label class="input-group-text" for="inputGroupFile02">Agregar</label>
                    </div>
                </div>
          </div>
          <hr>
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
                <th>Código de Bienes</th>
                <th>Descripción de la Incidencia</th>
                <th>Fecha de la Incidencia</th>
                <th>Nombre del Espacio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($incidencia as $incidencias)
            <tr>
                <td>{{$incidencias->id}}</td>
                <td>{{$incidencias->cod_bienes}}</td>
                <td>{{$incidencias->descripcion}}</td>
                <td>{{$incidencias->fecha_incidencia}}</td>
                <td>{{$incidencias->nom_espacio}}</td>
                <td> <img src="{{$incidencias->img}}" alt="" class="img-fluid"  width="80" height="80"></td>
               
            </tr>   
        @endforeach
        </tbody>
 
    <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
            <script type="text/javascript">
                    $(document).ready(function () {
                    $('#example').DataTable();
                    });
            </script> 
        </div>
    </div>
@stop
        

