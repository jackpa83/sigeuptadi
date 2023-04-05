@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Solicitantes</h1>
    <hr>
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
    <form action="{{route('solicitante.update',$solicitante->id)}}" method="POST">   
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$solicitante->nombre}}" >      
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{$solicitante->apellido}}" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Cedula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{$solicitante->cedula}}" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Tipo de Solicitante</label>
            <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                <option value="{{$solicitante->tipo_usuario}}">{{$solicitante->tipo_usuario}}</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Obrero">Obrero</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Docente">Docente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Carrera o Departamento</label>
            <select name="carr_dpto" id="carr_dpto" class="form-control">
                <option value="{{$solicitante->carr_dpto}}">{{$solicitante->carr_dpto}}</option>
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
                <option value="Sistemas">Sistemas</option>
                <option value="Pasantías">Pasantías</option>
                <option value="DACE">DACE</option>
                <option value="MEPSU">MEPSU</option>
                <option value="Deportes">Deportes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{$solicitante->telefono}}" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$solicitante->email}}" >
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
        

