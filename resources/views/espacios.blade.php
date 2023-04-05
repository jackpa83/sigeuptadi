@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Registros de Espacios</h1>
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
@can('espacios.store')
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Espacios">
</button>
@endcan
<a href="{{route('espacios.downloadPdf')}}" class="btn">
    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40"  data-toggle="tooltip" data-placement="left" title="Descargar Pdf">
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white"> <b> Registrar Espacios</b> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('espacios.store');}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Nombre del Espacio</label>
                    <input type="text" class="form-control" id="nom_espacio" name="nom_espacio" required>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Ubicación</label>
                    <select name="ubicacion" id="ubicacion" class="form-control">   
                        @foreach ($ubicacion as $ubicacion)
                            <option value="{{$ubicacion->id}}">{{$ubicacion->ubicaciones}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Estatus</label>
                    <select name="estatus" id="estatus" class="form-control">
                        @foreach ($estatus as $estatus)
                            <option value="{{$estatus->id}}">{{$estatus->estatus}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        @foreach ($estado as $estado)
                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1" class="form-label">Descripcion de Ubicación</label>
                    <textarea name="desc_espacio" id="desc_espacio" cols="20" rows="5" class="form-control" required></textarea>
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
                <th>Nombre del Espacio</th>
                <th>Ubicación</th>
                <th>Estatus</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($espacios as $espacios)
            <tr>
                <td>{{$espacios->id}}</td>
                <td>{{$espacios->nom_espacio}}</td>
                <td>{{$espacios->ubicaciones." /".$espacios->desc_ubicaciones}}</td>
                <td>{{$espacios->estatus}}</td>
                <td>{{$espacios->estado}}</td>
                <td>
                @can('espacios.endswitch')
                <a href="{{route('espacios.edit',$espacios->id)}}">
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
                        title: 'Espacio Registrado con Exito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
        @endif
        @if(Session::has('message'))
                <script type="text/javascript">
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Espacio Actualizado con Exito',
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
        

