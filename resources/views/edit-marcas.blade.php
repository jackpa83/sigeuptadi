@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Marcas</h1>
    <!-- JavaScript Bundle with Popper -->

    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
  
@stop
@section('content')
<div class="container-fluid">
<div class="row">
  
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br><br>
    <form action="{{route('articulo.update',$marcas->id)}}" method="POST">   
    @csrf
    @method('PUT')
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Marca</label>
                <input type="text" class="form-control" id="nom_marca" name="nom_marca" value="{{$marcas->nom_marca}}" require>
               
        </div>
        <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Descripcion de la Marca</label>
                <input type="text" class="form-control aling-left" id="desc_marca" name="desc_marca" value="{{$marcas->desc_marca}}" require>
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
        

