@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Traspasos</h1>
    <!-- JavaScript Bundle with Popper -->

    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
  
@stop
@section('content')

<div class="row">
    <div class="col-md-12 ">
    <br><br>
   
    @foreach ($traspasos as $traspasos)
    @endforeach
    <form action="{{route('trapasos.update',$traspasos->id);}}" method="POST">   
    @csrf
    @method('PUT')
    <h3>Datos del Equipo o Mueble:</h3> 
    <hr>
    <br> 
            <div class="row">
                <div class="col-4 col-ms-12">
                    <label for="exampleInputEmail1" class="form-label">N° Bien Nacional</label>
                    <input type="text" class="form-control" id="n_bienes"  value="{{$traspasos->num_bienes}}" readonly> 
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputEmail1" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo"  value="{{$traspasos->modelo}}" readonly>
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Marca</label>
                    <input type="text" class="form-control" value="{{$traspasos->nom_marca}}" readonly></div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Estado de Bien</label>
                    <input type="text" class="form-control" value="{{$traspasos->estado_bien}}" readonly>
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Ubicaciones</label>
                    <input type="text" class="form-control" id="ubicacion_id"  value="{{$traspasos->nom_espacio}}" placeholder="4444" readonly>
                </div>
            </div>
            <hr>
          <h3>Trasladar a :</h3>  
            <div class="row">
                <div class="col-4">
                <label for="exampleInputPassword1" class="form-label">Nueva Ubicación</label> 
                    <select name="espacios_id" id="espacios_id" class="form-control"> 
                    @foreach ($espacios as $espacios)
                        <option value="{{$espacios->id}}">{{$espacios->nom_espacio}}</option>      
                    @endforeach
                    </select>
                </div>
                <input type="hidden" class="form-control"  name="id"  value="{{$traspasos->id}}" placeholder="4444" readonly>
            </div>
      <br>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class=" btn btn-primary">Traspasar</button>
                </div>
            </div>         
    </form> 
    <br>
    </div>
    </div>
</div>
</div>
<hr>
        </div>
    </div>
@stop
        

