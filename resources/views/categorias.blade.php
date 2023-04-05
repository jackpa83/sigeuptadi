@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Registro de Categorias</h1>
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
@can('categorias.store')
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="../vendor/agregar-archivo.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Registrar Categorias">
</button>
@endcan
<a href="{{route('categorias.downloadPdf')}}" class="btn">
    <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Descargar Pdf" > 
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary"><b> Registrar Categorias</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('categorias.store');}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Categoria</label>
        <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" required >
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
    $('#example').DataTable("language": {
                            "url": "../public/jss/Spanish.json",
                        });
});
</script>
    <div class="row">
        <div class="col-12">
            <br><br>
        <table id="example" class="table display" style="width:100%" >
        <thead class="bg-primary">
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $categorias)
            <tr>
                <td>{{$categorias->id}}</td>
                <td>{{$categorias->nom_categoria}}</td>
                <td>
                @can('categorias.edit')
                    <a href="{{route('categorias.edit',$categorias->id)}}">
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
    @if(Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Categoria registrada con Exito!',
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
                title: 'Categoria actualizada con Exito!',
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
        

