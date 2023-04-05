@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Bienes</h1>
    <hr>
    <!-- JavaScript Bundle with Popper -->

    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
  
@stop
@section('content')
@foreach ($bien as $bien) @endforeach
<div class="container-fluid">
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br><br>
    
    <form action="{{route('bienes.update',$bien->id)}}" method="POST" class="needs-validation">   
    @csrf
    @method('PUT')

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">N° Bien Nacional</label>
                <input type="text" class="form-control" id="n_bienes" name="n_bienes" value="{{$bien->num_bienes}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{$bien->modelo}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Serial (S/N)</label>
                <input type="text" class="form-control" id="serial_bien" name="serial_bien" value="{{$bien->serial_bien}}" required >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Marca</label>
                <select name="marca_id" id="marca_id" class="form-control">
                <option value="{{$bien->marcas_id}}">{{$bien->nom_marca}}</option>
                        @foreach ($marcas as $marcas)
                            <option value="{{$marcas->id}}">{{$marcas->nom_marca}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="{{$bien->categorias_id}}">{{$bien->nom_categoria}}</option>
                        @foreach ($categoria as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nom_categoria}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Espacio de Ubicación</label>
                <select name="ubicacion_id" id="ubicacion_id" class="form-control">
                <option value="{{$bien->ubicacion_id}}">{{$bien->ubicaciones}}</option>
                        @foreach ($espacios as $espacios)
                            <option value="{{$espacios->id}}">{{$espacios->nom_espacio}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Estado del Bien</label>
                <select name="estado_bien" id="estado_bien" class="form-control">
                <option value="{{$bien->estado_bien}}">{{$bien->estado_bien}}</option>
                            <option value="Activo">Activo</option>
                            <option value="Desincorporado">Desincorporado</option>
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    </div>
    </div>
</div>
</div>

<hr>




        </div>
    </div>
@stop
        

