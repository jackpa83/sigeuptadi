@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Registro de Bienes</h1>
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
@can('bienes.store')
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Bienes">
</button>
@endcan
<a href="{{route('bienes.downloadPdf')}}" class="btn " data-toggle="tooltip" data-placement="left" title="Descargar Pdf"> 
    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40" > 
</a>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header bg-primary"><b> Registrar Bienes </b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="needs-validation" action="{{route('bienes.store');}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="n_bienes" class="form-label">N° Bien Nacional</label>
                        <input type="text" class="form-control" id="n_bienes" name="n_bienes" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                    
                </div>
                <div class="row">
                     <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">S/N Serial</label>
                        <input type="text" class="form-control" id="serial_bien" name="serial_bien" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Marca</label>
                        <select name="marca_id" id="marca_id" class="form-control">
                                @foreach ($marcas as $marcas)
                                    <option value="{{$marcas->id}}">{{$marcas->nom_marca}}</option>
                                @endforeach
                        </select>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                                @foreach ($categoria as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nom_categoria}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Espacio de Ubicación</label>
                        <select name="ubicacion_id" id="ubicacion_id" class="form-control">
                            <option value="1">Almacen Bienes Nacionales</option>
                        </select>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="add" class="btn btn-primary">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on("click","#add",function(e){
    alert("Hola");
  });    
</script>
    <div class="row">
        <div class="col-12">
            <br><br>
        <table id="example" class="table display" style="width:100%" >
        <thead class="bg-primary">
            <tr>
                <th>Id</th>
                <th>N° Bien Nacional</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Serial (S/N)</th>
                <th>Categoria</th>
                <th>Ubicacion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($bien as $bien)
            <tr>
                <td>{{$bien->id}}</td>
                <td>{{$bien->num_bienes}}</td>
                <td>{{$bien->modelo}}</td>
                <td>{{$bien->nom_marca}}</td>
                <td>{{$bien->serial_bien}}</td>
                <td>{{$bien->nom_categoria}}</td>
                <td>{{$bien->ubicaciones}}</td>
                <td>{{$bien->estado_bien}}</td>
                <td>
                @can('bienes.edit') 
                        <a href="{{route('bienes.edit',$bien->id)}}">
                            <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                <img src="../vendor/editar.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Editar">
                            </button> 
                        </a>
                @endcan
                </td>   
            </tr>   
        @endforeach
        </tbody>

    </table>

    <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>


@if(Session::has('message'))
    <script type="text/javascript">
       Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Bien Registrado con Exito',
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
            title: 'Bien Actulizado con Exito',
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
        
