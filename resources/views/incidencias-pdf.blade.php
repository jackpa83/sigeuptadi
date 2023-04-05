<!doctype html>
<html lang="en">

<head>
    <title>PDF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
    <style>
    .men{
        position: relative;
        text-align: center;
    }
    table{
        width:100%; 
        border-collapse:collapse;
            font-size: 10px;    
        }

    td{
        border:none;
    }
    th{
        border:none;   
    }

        th, td {
            width: auto;
            text-align: center;
            vertical-align: top;
            border: 1px solid  #566573 ;
            border-collapse: collapse;
            padding: 0.3em;
        }
        .fondo{
            background:#050f66;
        }
        .color{
            color:white;
        }
        footer {
      position: fixed;
      left: 0px;
      bottom: -10px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
</style>
</head>
<header>
    <table>
        <tr>
            <td style="text-align:left;border:none;"><img src="../public/vendor/logo-1.png"  width="92" height="92"></td>
            <td style=" text-align:center;border:none;">
                REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA<br>
                UNIVERSIDAD POLITECNICA TERRITORIAL DEL ESTADO ARAGUA<br>
                FEDERICO BRITO FIGUEROA<br>
                LA VICTORIA ESTADO ARAGUA<br>
            </td>
            <td style="text-align:left;border:none;"><img src="../public/vendor/n.jpg"  width="82" height="92"></td>
        </tr>
    </table>
</header>
<body>
    <br>
<table class="table">
    <tr>
        <td colspan="3" style=" text-align:center;border:none;"><h1  >Listado General de incidencias ocurridas</h1></td>
    </tr>
</table>
<table >
    <tr>
        <td style=" text-align:left;border:none;">Fecha del Reporte: <b><?php echo date("j-M-Y");?></b></td>
        <td style=" text-align:right;border:none;">Realizado por: <b>{{ Auth::user()->name }}</b></td>
    </tr>
</table>
<br>
        <table class="table">
            <thead class="fondo">
                    <th class="color" style="border:none;" >Id</th>
                    <th class="color"style="border:none;" >Codigo</th>
                    <th class="color"style="border:none;" >Descripción</th>
                    <th class="color"style="border:none;" >Fecha de Incidencia</th>
                    <th class="color"style="border:none;" >Registrado por</th>
                    <th class="color"style="border:none;">Espacio</th>
                    <th class="color" style="border:none;">Estatus</th>
                    
            </thead>
                <tr>
                @forelse ($incidencias as $incidencias)
                    <tr style="border:none;">
                        <td>{{$incidencias->id}}</td>
                        <td>{{$incidencias->num_bienes}}</td>
                        <td>{{$incidencias->descripcion}}</td>
                        <td>{{$incidencias->fecha_incidencia}}</td>
                        <td>{{$incidencias->registrado_por}}</td>
                        <td>{{$incidencias->nom_espacio}}</td>
                        <td>{{$incidencias->est_incidencia}}</td>   
                    </tr>
                @empty
                @endforelse
                </tr>
            </tbody>
            <?php ?>
        </table>
</body>
<footer>
    <h6>Dirección(Sede Principal):<small>Avenida Universidad s/n, al lado del Comando de la FAN, La Victoria Edo Aragua </small><small> Emitido por: </small>{{ Auth::user()->name }}<small>, el:</small> <?php echo date("j-M-Y"); ?> </h6>
<br>
     
</footer>
</html>

