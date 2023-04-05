@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark">Prestamos</h1>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('jss/bundle.js') }}"></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.css') }}" rel="stylesheet">
    <script src="{{ asset('jss/datatable.min.js') }}"  ></script>
    <script src="{{asset('vendor/sweetalert.js') }}"></script>
@stop
@section('content')
<div class="container-fluid">
    <section>
    <div class="row">
        <div class="col-md-6">
        <h6>Ingrese su numero de Cedula para solicitar un Prestamos <small class="text-primary">Solo Solicitantes Registrados</small></h6>
        </div>
       
        </div>
        <div class="row">
        
            <div class="col-md-6 col-sx-4 col-lg-6 col-ms-12">
                
                <form class="row g-3" method="POST" action="{{route('prestamos.buscar');}}">
                @csrf
                    <div class="col-auto">
                        <input type="text" class="form-control" id="id" name="buscar"  placeholder="Ingrese la Cedula" required>
                    </div>
                    <div class="col-auto">
                        <label for=""></label>
                        <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div class="row">
</div>
<hr>


<script type="text/javascript">
    $(document).ready(function () {     
    $('#example').DataTable();
});
</script>
    <a href="{{route('prestamos.downloadPdf')}}" class="btn">
        <img src="../vendor/descargar-pdf.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Descargar Pdf" >   
    </a>
<br>
    <div class="row">
        <div class="col-12">
            <br><br>
            <table id="example" class="table display" style="width:100%" >
        <thead class="bg-primary">
            <tr>
                <th>Id</th>
                <th>N° de Bien</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Fecha de Prestamos</th>
                <th>Fecha de Entrega</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($prestamos as $prestamos)
            <tr>
                <td>{{$prestamos ->id}}</td>
                <td>{{$prestamos ->num_bienes}}</td>
                <td>{{$prestamos ->cedula}}</td>
                <td>{{$prestamos ->nombre}}</td>
                <td>{{$prestamos ->apellido}}</td>
                <td>{{$prestamos ->tipo_usuario}}</td>
                <td>{{$prestamos ->carr_dpto}}</td>
                <td>{{$prestamos ->fecha_prestamos}}</td>
                <td>{{$prestamos ->fecha_entrega}}</td>
                <td>{{$prestamos ->estatus_prestamo}}</td>
                <td>
                @can('prestamos.edit')
                    <a href="{{route('prestamos.update',$prestamos->id)}}">
                        <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModale">
                                <img src="../vendor/bloquear.png" class="img img-resposive" alt=""  width="32" height="40" data-toggle="tooltip" data-placement="left" title="Cerrar Prestamo">
                        </button> 
                    </a>
                @endcan
                </td>
            </tr>   
        @endforeach
        </tbody>
        <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
        <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
        <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
        <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
                @if(Session::has('message'))
                    < <script type="text/javascript">
                        Swal.fire(
                        'Felicidades!',
                        'Prestamo otorgado con Exito!',
                        'success'
                        )
                    </script>
                @endif
                @if(Session::has('update'))
                    <script type="text/javascript">
                        Swal.fire(
                        'Felicidades!',
                        'Prestamo cerrado con Exito!',
                        'success'
                        )
                    </script>
                @endif
                @if(Session::has('register'))
                    <script type="text/javascript">
                        toastr.options = {
                            "progressBar":true,
                        }
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                            })

                            swalWithBootstrapButtons.fire({
                                    title: 'Solicitante no se encuentra Registrado',
                                    text: "Desea registrarlo!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Si',
                                    cancelButtonText: 'No',
                                    reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    var url = "{{ route('solicitante') }}";
                                            location.href = url;
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    var url = "{{ route('prestamos') }}";
                                            location.href = url;
                                }
                            })
                    </script>
                @endif
                @if(Session::has('notifi'))
                <script type="text/javascript">
                        Swal.fire(
                        'Posee un Prestamos Activo!',
                        'Finalicelo e Intente de Nuevo.',
                        'danger'
                        )
                    </script>
                @endif   
            <script type="text/javascript">
                    $(document).ready(function () {
                        $('#example').DataTable(
                        {
                            "language": {
                                "lengthMenu": " Mostrar  _MENU_  Registros por página",
                                "zeroRecords": "No se encontraron registros",
                                "info": "Mostrando página _PAGE_ de _PAGES_",
                                "infoEmpty": "No se encuentran Registros",
                                "infoFiltered": "(filtered from _MAX_ total records)",
                                'search':"Buscar",
                                'paginate':{
                                    'next':'Siguiente',
                                    'previous':'Anterior'
                                }
                            }
                        }
                    );
                    });
            </script> 
        </div>
    </div>
@stop
        

