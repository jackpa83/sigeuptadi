<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
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
            font-size: 12px;    
        }

    td{
        border:2px solid black;
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
        <img src="../public/vendor/banner.png"  width="720" height="100">
</header>
<body>
<br><br>
<h5 >Listado de las Categorias</h5>
<hr>
<br>
        <table class="table">
            <thead class="fondo">
                    <th class="color">Id</th>
                    <th class="color">Categorias</th>               
            </thead>
                <tr>
                @forelse ($categorias as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom_categoria}}</td>

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

