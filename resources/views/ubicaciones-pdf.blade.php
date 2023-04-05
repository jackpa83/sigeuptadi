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
<br><br>
<h5 >Listado de las Ubicaciones</h5>
<hr>
<br>
        <table class="table">
            <thead class="fondo">
                    <th class="color">Id</th>
                    <th class="color">Ubicacion</th>
                    <th class="color">Descripción</th>                 
            </thead>
                <tr>
                @forelse ($ubicacion as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->ubicaciones}}</td>
                        <td>{{ $user->desc_ubicaciones}}</td>
                    </tr>
                @empty
                @endforelse
                </tr>
            </tbody>
            <?php ?>
        </table>
</body>

</html>

