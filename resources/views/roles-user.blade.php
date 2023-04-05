@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuario</h1>
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
    <form action="{{route('user.updat',$user->id);}}" method="POST">   
    @csrf
    @method('PUT')
        <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" value="{{$user->name}}" readonly>
        </div>
        <h3>Roles de Usuario</h3>
        <hr>
        @foreach($rol as $rol)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{$rol->id}}" id="flexCheckChecked" null>
            <label class="form-check-label" for="flexCheckChecked">
                {{$rol->name}}
            </label>
        </div>
        @endforeach
        <hr>
        <button type="submit" class="btn btn-primary">Asignar Role</button>
    </form>
    </div>
    </div>
</div>
</div>

<hr>




        </div>
    </div>
@stop
        

