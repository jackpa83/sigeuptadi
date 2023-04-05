@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Ubicaciones</h1>
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
    @foreach ($ubicacion as $ubicacion) @endforeach
    <form action="{{route('ubicacion.update',$ubicaciones->id)}}" method="POST">   
        @csrf
        @method('PUT')

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ubicación</label>
        <input type="text" class="form-control" id="bicacion" name="ubicacion" value={{$ubicacion->ubicaciones}} >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Descripcion de la Ubicación</label>
        <input type="text" class="form-control" id="desc_ubicacion" name="desc_ubicacion" value="{{$ubicacion->desc_ubicaciones}}">
    </div>
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
     
    </form>
    </div>
    </div>
</div>
</div>
<hr>
        </div>
    </div>
@stop
        

