@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Espacios</h1>
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
    <form action="{{route('espacios.update',$espacios->id)}}" method="POST">   
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Nombre del Espacio</label>
            <input type="text" class="form-control" id="nom_espacio" name="nom_espacio" value="{{$espacios->nom_espacio}}" required>  
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Ubicación</label>
            <select name="ubicacion" id="ubicacion" class="form-control" required>
                
                @foreach ($ubicacion as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->ubicaciones}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Estatus</label>
            <select name="estatus" id="estatus" class="form-control" required>
           
                 @foreach ($estatus as $estatus) 
                    <option value="{{$estatus ->id}}">{{$estatus ->estatus}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
          
                @foreach ($estado  as $estado) 
                    <option value="{{$estado ->estado_id}}">{{$estado ->estado}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Descripcion de Ubicación</label>
            <textarea name="desc_espacio" id="desc_espacio" cols="20" rows="5" class="form-control" required >{{$espacios->desc_espacio}}</textarea>
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
        

