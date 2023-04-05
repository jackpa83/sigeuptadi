@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Prestamos</h1>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">

@stop
@section('content')
<div class="container-fluid">

</div>
<div class="row">
    <div class="col-md-12" >


    <form action="" method="POST">     
    @csrf
    <h3>Datos del Prestamo:</h3> 
    <hr>
    <br> 
            <div class="row">
                <div class="col-4 col-ms-12">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control"  value="{{$prestamos->id}}" readonly> 
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control"  value="" readonly>
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                    <input type="text" class="form-control"   value="" readonly></div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Tipo de Solicitante</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
                <div class="col-4 col-ms-12">
                    <label for="exampleInputPassword1" class="form-label">Carrera o Departamento</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <hr>
          <h3>Datos del Equipo:</h3>  
            <div class="row">

                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">N° Bien Nacional</label>
                    <input type="text" class="form-control" id="num_bienes" name="num_bienes" >
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Fecha de Prestamo</label>
                    <input type="date" class="form-control" id="fech_prestamo" name="fec_prestamo" >
                </div>
                <div class="col-4">
                    <label for="exampleInputEmail1" class="form-label">Fecha de Entrega</label>
                    <input type="date" class="form-control" id="fech_entrega" name="fec_entrega" >   
                </div>
                <div class="col-4"><input type="hidden" class="form-control" id="solicitante_id"  name="solicitante_id" value="" ></div>
            </div>
      <br>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class=" btn btn-primary">Registrar</button>
                </div>
            </div>

</form>

        </div>
    </div>
@stop
        

