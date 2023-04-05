@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Incidencias</h1>
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
@can('incidencias.store')
<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Incidencias">
</button>
@endcan
<a href="{{route('incidencias.downloadPdf')}}" class="btn">
    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40"  data-toggle="tooltip" data-placement="left" title="Descargar Pdf"> 
</a>
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
                <label for="exampleInputPassword1" class="form-label">Tipo de Incidencia</label>
                    <select name="t_incidencia" id="t_incidencia" class="form-control">
                        <option value="Bienes">Bienes</option>
                        <option value="Inmueble">Inmuebles</option>
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
                      <label for="exampleInputEmail1" class="form-label">Código de Bienes Nacionales</label>
                      <select id="cod_bienes" name="cod_bienes" class="form-control">
                                @foreach ($bienes as $bienes)
                                    <option value="{{$bienes->id}}">{{$bienes->num_bienes}}</option>
                                @endforeach
                        </select>
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Fecha de la Incidencia</label>
                      <input type="date" class="form-control" id="fecha_incidencia" name="fecha_incidencia" require >
                </div>
               
          </div>
          <div class="row">
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Incidencia registrada por:</label>
                      <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="registrado_por" name="registrado_por" readonly >
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Fecha de Solución <small class="text-danger">(Tentativo)</small></label>
                      <input type="date" class="form-control" id="fecha_solucion" name="fecha_solucion" required >
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
                <th>Tipo</th>
                <th>Código de Bienes</th>
                <th>Descripción</th>
                <th>Fecha de la Incidencia</th>
                <th>Fecha de Solucion <small>(Tentativa)</small> </th>
                <th>Nombre del Espacio</th>
                <th>Estatus</th>
                <th>Registrada</th>
                <th>Imagen</th>
                <th>Reporte</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>  
        @foreach ($incidencia as $incidencias)
            <tr>
                <td>{{$incidencias->t_incidencia}}</td>
                <td>{{$incidencias->num_bienes}}</td>
                <td>{{$incidencias->descripcion}}</td>
                <td>{{$incidencias->fecha_incidencia}}</td>
                <td>{{$incidencias->fecha_solucion}}</td>
                <td>{{$incidencias->nom_espacio}}</td>
                <td>{{$incidencias->est_incidencia}}</td>
                <td>{{$incidencias->registrado_por}}</td>
                <td> 
                    
                    <img src="{{$incidencias->img}}" alt="" class="img-fluid"  width="80" height="80"></td>
                <td>
                <a href="{{route('incidencias.incidenciaPdf',$incidencias->id)}}">
                                <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Reporte Detallado">
                                </button> 
                        </a>
                </td>
                <td >
                
                    @can('incidencias.edit')
                    
                    <a href="{{route('incidencias.edit',$incidencias->id)}}">
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
    @if(Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Incidencia registrada con Exito!',
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
            title: 'Incidencia Actulizada con Exito!',
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
        

