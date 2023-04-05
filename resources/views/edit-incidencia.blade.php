@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Incidencias</h1>
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
    @foreach ($incidencia as $incidencia) @endforeach
    <form action="{{route('incidencias.update',$incidencia->id);}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
    
          <div class="row">
                <div class="col-md-6">   
                    <label for="exampleInputPassword1" class="form-label">Tipo de Incidencia</label>
                    <input type="text" class="form-control" readonly="yes" value="{{$incidencia->t_incidencia}}"> 
                </div>
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Nombre Espacio</label>
                    <input type="text" name="nom_espacio" id="nom_espacio" class="form-control" readonly="yes" value="{{$incidencia->nom_espacio}}"> 
                </div>
          </div>
          
          <div class="row">
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Código de bienes Nacionales </label>
                      <input type="text" class="form-control" id="cod_bienes" name="cod_bienes" value="{{$incidencia->num_bienes}}"  readonly>
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Fecha de la Incidencia</label>
                      <input type="text" class="form-control" id="fecha_incidencia" name="fecha_incidencia" value="{{$incidencia->fecha_incidencia}}" placeholder="" readonly >
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Fecha de Solucion</label>
                      <input type="date" class="form-control" id="fecha_solucion" name="fecha_solucion" value="date_format({{$incidencia->fecha_solucion,"Y/m/d H:i:s");?>" placeholder="{{}}">
                </div>
                <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Solucionado por:</label>
                    <select name="solventado_por" id="solventado_por" class="form-control">

                        <option value="{{$incidencia->solventado_por}}">{{$incidencia->solventado_por}}</option>

                        <option value="Administración y contaduría">Administración y contaduría</option>
                        <option value="Mecánica">Mecánica</option>
                        <option value="Informática">Informática</option>
                        <option value="Gestión y calidad de Ambiente">Gestión y calidad de Ambiente</option>
                        <option value="Ciencias Básicas">Ciencias Básicas</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Electricidad">Electricidad</option>
                        <option value="Postgrado">Postgrado</option>
                        <option value="Estudios Generales">Estudios Generales</option>
                        <option value="Extensión Universitaria">Extensión Universitaria</option>
                        <option value="Vinculación Social">Vinculación Social</option>
                        <option value="Caja">Caja</option>
                        <option value="Compras">Compras</option>
                        <option value="RRHH">RRHH</option>
                        <option value="Creación Intelectual">Creación Intelectual</option>
                        <option value="Departamento de Sistemas"> Departamento de Sistemas</option>
                        <option value="Pasantías">Pasantías</option>
                        <option value="DACE">DACE</option>
                        <option value="MEPSU">MEPSU</option>
                        <option value="Deportes">Mantenimiento</option>
                        <option value="Sistemas">Transporte</option>

                    </select>
                </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Estatus de la  Incidencia</label>
                    <select name="est_incidencia" id="est_incidencia" class="form-control">
                        <option value="{{$incidencia->est_incidencia}}">{{$incidencia->est_incidencia}}</option>
                        <option>-----------------------</option>
                        <option value="Activa">Activa</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Resuelta">Resuelta</option>
                    </select>
                </div>
                <div class="col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Registrado por:</label>
                      <input type="text" class="form-control" id="registrado_por" name="registrado_por" value="{{$incidencia->registrado_por}}" readonly>
                </div>
          </div>
          <hr>
          <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1" class="form-label">Descripción de la Incidencia</label>
                    <textarea name="descripcion" id="" cols="20" rows="5" id="descripcion" class="form-control">{{$incidencia->descripcion}}</textarea>
                </div>
          </div>
          <hr>
          <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
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
        

