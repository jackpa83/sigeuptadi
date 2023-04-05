@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Bitacora de Usuarios</h1>
    <!-- JavaScript Bundle with Popper -->

    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="row">
</div>
<hr>
<!-- Button trigger modal -->


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
        <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" require >
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
            <tr class="text-center">
                <th class="text-center">Id</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Acción</th>
                <th class="text-center">En la Tabla</th>
                <th class="text-center">Fecha</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($bitacora as $categorias)
            <tr class="text-center">
                <td>{{$categorias->id}}</td>
                <td>{{$categorias->usuario}}</td>
                <td>{{$categorias->accion}}</td>
                <td>{{$categorias->modulo}}</td>
                <td>{{$categorias->created_at}}</td>
  
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
            toastr.options = {
                "progressBar":true,
            }   
                toastr.success("{{ Session::get('success')}}");  
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
        

