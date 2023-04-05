@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Categorias</h1>
    <hr>
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
    <form action="{{route('categorias.update',$categorias->id)}}" method="POST">   
    @csrf
    @method('PUT')
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="nom_categoria" name="nom_categoria" value="{{$categorias->nom_categoria}}" require>
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
        

