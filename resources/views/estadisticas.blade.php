@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')

<script src="{{ asset('vendor/chart.js/newchar.js') }}" ></script>
<div class="row">
    <div class="col-12"><h1>Estadísticas</h1><hr></div>
</div>
<div class="row">
    <div class="col-md 12">
            <form class="row g-3" method="POST" action="{{route('estadisticas.buscar');}}">
                    @csrf
                        <div class="col-auto">
                            <input type="date" class="form-control" id="desde" name="desde"  required>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" id="desde" name="hasta"  required>
                        </div>
                        <div class="col-auto">
                            <button  class="btn form-control "><img src="../vendor/buscar.png" class="img img-resposive" alt=""  width="32" height="32" data-toggle="tooltip" data-placement="left" title="Reporte Detallado"></button>
                        </div>
            </form>
        <br>
        <hr>
    </div>
</div>
<div class="row">
    
   <br>
    
    <div class="col-2">

        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-primary text-center">  <b>Incidencias Activas <small>Inmuebles</small> </b></div>
            <div class="card-body text-secondary bg-primary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$est_incidencia}}</h1> 
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-primary text-center">  <b> Bienes Registrados </b></div>
            <div class="card-body text-secondary bg-primary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$elements}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-primary text-center"> <b> Prestamos Registrados </b></div>
            <div class="card-body text-secondary bg-primary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$pres}}</h1>  
            </div>
        </div>
    </div>
    
    
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center"> <b> Espacios Registrados </b></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$espa}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center">  <b>Solicitantes Registrados </b></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$soli}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center">  <b>Incidencias Activas <small>Bienes</small></b></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$est_bienes}}</h1>  
            </div>
        </div>
    </div>

    </div>

</div>
<div class="row">

    <script>
        const myChart = new Chart(ctx, {...});
        const myCharts = new Chart(ctxs, {...});
        const myChartss = new Chart(ctxss, {...});
    </script>
<div class="col-4">
<br>
<canvas id="myChart"></canvas>

        <script>
            <?php ?>
        const ctx = document.getElementById('myChart');

       
        var soli   = <?php echo  $soli;?>;
        var prestamos   = <?php echo $pres;?>;
		var bienes   = <?php echo $elements;?>;
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Bienes', 'Prestamos', 'Solicitantes'],
            datasets: [{
                label: '# Indicadores Varios',
                data: [bienes, prestamos, soli ],
                backgroundColor: [
                    'rgba( 9, 19, 107 , 1',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba( 9, 19, 107',
                        'rgba(54, 162, 235)',
                    'rgb(255, 205, 86)'
                    ],  
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        </script>
</div>
<div class="col-4">
        <br>
        <canvas id="myCharts"></canvas>
        <script>
                const ctxs = document.getElementById('myCharts');
                var ubicaciones   = <?php echo $est_incidencia;?>;
                var incidencias   = <?php echo  $no_resuelta;?>;
                new Chart(ctxs, {
                    type: 'bar',
                    data: {
                    labels: ['Resueltas', 'No Resueltas'],
                    datasets: [{
                        label: 'Bienes (Muebles e Inmuebles)',
                        data: [ubicaciones,incidencias],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1)',
                            'rgba(54, 162, 235)',
                            ],
                            borderColor: [
                                'rgba( 9, 19, 107)',
                                'rgba(54, 162, 235)'
                            ],
                        borderWidth: 2
                    }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
        </script>
</div>
<div class="col-4">
        <br>
        <canvas id="myChartss"></canvas>
        <script>
                const ctxss = document.getElementById('myChartss');
                var ubicaciones = <?php echo $no_resuelta;?>;
                var incidencias = <?php echo  $est_incidencia;?>;
                var n_proceso   = <?php echo  $n_proceso;?>;
                new Chart(ctxss, {
                    type: 'bar',
                    data: {
                    labels: ['Resueltas', 'Activas','En Proceso'],
                    datasets: [{
                        label: ' Incidencias',
                        data: [ubicaciones,incidencias,n_proceso ],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1)',
                            'rgba(302,98,23, 1)',
                            'rgba(24,102,39, 1)'
                            ],
                            borderColor: [
                                'rgba( 9, 19, 107)  ',
                            'rgba(302,98,23)',
                            'rgb(24,102,39)'
                            ],
                        borderWidth: 2
                    }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
        </script>
</div>
       
        <script src="{{ asset('vendor/chart.js/Chart.js') }}" defer></script>
   
</div>
</div>
@stop