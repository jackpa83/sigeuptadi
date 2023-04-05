@extends('adminlte::page')

@section('title', 'Upt Aragua')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')

<script src="{{ asset('vendor/chart.js/newchar.js') }}" ></script>
<div class="row">
<div class="col-12"><h1>Estadísticas Detalladas</h1><hr></div>
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
            <div class="card-header bg-primary text-center"><b>Incidencias</b></div>
            <div class="card-body bg-primary text-secondary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$incidencias}}</h1> 
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-primary text-center">  <b>Incidencias </b> <small>Inmuebles</small></div>
            <div class="card-body text-secondary bg-primary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$inm_inci}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-primary text-center"><b>Incidencias </b> <small>Bienes</small></div>
            <div class="card-body text-secondary bg-primary">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$inm_mue}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center"> <b>Prestamos</b></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$fech_prest}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center"><b>Prestamos</b> <small>Activos</small></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$fech_prest_act}}</h1>  
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-secondary mb-3 justify-content justify-content" style="max-width: 18rem;">
            <div class="card-header bg-info text-center"><b>Prestamos</b> <small>Cerrados</small></b></div>
            <div class="card-body text-secondary bg-info">
                <h2 class="card-title justify-content"></h2>
                <h1 class="text-center">{{$fech_prest_cerr}}</h1>  
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
<div class="col-1   "></div>
<div class="col-3">
<br>
<canvas id="myChart"></canvas>

        <script>

        const ctx = document.getElementById('myChart');
//$fech_prest_act,$fech_prest,$incidencias$fech_prest_cerr
       
        var prestamos   = <?php echo $inm_inci;?>;
		var bienes   = <?php echo $inm_mue;?>;
        new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: ['Bienes', 'Inmuebles'],
            datasets: [{
                label: '#Inicidencias por Tipo',
                data: [bienes, prestamos],
                backgroundColor: [
                    'rgba( 9, 19, 107 , 1)',
                    'rgba(  53, 145, 255  ,1)',
                 
                    ],
                    borderColor: [
                    'rgb( 9, 19, 107 )',
                    'rgb(  53, 145, 255  )',

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
                var prestamos   = <?php echo $inm_inci;?>;
		        var bienes   = <?php echo $incidencias;?>;
                new Chart(ctxs, {
                    type: 'bar',
                    data: {
                    labels: ['Incidencias Inmuebles', 'Inicidencias'],
                    datasets: [{
                        label: 'Inicidencias Vs Incidencias Inmuebles',
                        data: [bienes, prestamos],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1',
                            'rgba(54, 162, 235, 1',
                            ],
                            borderColor: [
                            'rgb(9, 19, 107)',
                            'rgb(54, 162, 235)'
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
<div class="col-3">
        <br>
        <canvas id="myChartss"></canvas>
        <script>
                const ctxss = document.getElementById('myChartss');
                var prestamos   = <?php echo $inm_mue;?>;
		        var bienes   = <?php echo $incidencias;?>;
                new Chart(ctxss, {
                    type: 'pie',
                    data: {
                        labels: ['Inicidencias', ' Inicidencias Bienes'],
                    datasets: [{
                        label: 'Prestamos',
                        data: [bienes, prestamos],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1',
                            'rgba(54, 162, 235, 1',
                            ],
                            borderColor: [
                            'rgb(9, 19, 107)',
                            'rgb(54, 162, 235)'
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
       <!------------------------------------------------------------------------------------------------------------------------------------->
       <div class="row">

    <script>
        const myCharta = new Chart(ctxa, {...});
        const myChartsa = new Chart(ctxsa, {...});
        const myChartssa = new Chart(ctxssa, {...});
    </script>
<div class="col-1   "></div>
<div class="col-3">
<br>
<canvas id="myCharta"></canvas>

        <script>

        const ctx = document.getElementById('myCharta');
//$fech_prest_act,$fech_prest,$incidencias$fech_prest_cerr
       
        var prestamos   = <?php echo $inm_inci;?>;
		var bienes   = <?php echo $inm_mue;?>;
        new Chart(ctxa, {
            type: 'doughnut',
            data: {
            labels: ['Bienes', 'Inmuebles'],
            datasets: [{
                label: '#Inicidencias por Tipo',
                data: [bienes, prestamos],
                backgroundColor: [
                    'rgba( 9, 19, 107 , 1)',
                    'rgba(  53, 145, 255  ,1)',
                 
                    ],
                    borderColor: [
                    'rgb( 9, 19, 107 )',
                    'rgb(  53, 145, 255  )',

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
        <canvas id="myChartsa"></canvas>
        <script>
                const ctxs = document.getElementById('myChartsa');
                var prestamos   = <?php echo $inm_inci;?>;
		        var bienes   = <?php echo $incidencias;?>;
                new Chart(ctxsa, {
                    type: 'bar',
                    data: {
                    labels: ['Incidencias Inmuebles', 'Inicidencias'],
                    datasets: [{
                        label: 'Inicidencias Vs Incidencias Inmuebles',
                        data: [bienes, prestamos],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1',
                            'rgba(54, 162, 235, 1',
                            ],
                            borderColor: [
                            'rgb(9, 19, 107)',
                            'rgb(54, 162, 235)'
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
<div class="col-3">
        <br>
        <canvas id="myChartssa"></canvas>
        <script>
                const ctxss = document.getElementById('myChartssa');
                var prestamos   = <?php echo $inm_mue;?>;
		        var bienes   = <?php echo $incidencias;?>;
                new Chart(ctxssa, {
                    type: 'pie',
                    data: {
                        labels: ['Inicidencias', ' Inicidencias Bienes'],
                    datasets: [{
                        label: 'Prestamos',
                        data: [bienes, prestamos],
                        backgroundColor: [
                            'rgba( 9, 19, 107 , 1)',
                            'rgba(54, 162, 235, 1)',
                            ],
                            borderColor: [
                            'rgb(9, 19, 107)',
                            'rgb(54, 162, 235)'
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