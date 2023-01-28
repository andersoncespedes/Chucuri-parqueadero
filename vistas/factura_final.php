<?php ob_start();
date_default_timezone_set("America/Bogota");
$medidaTicket = 180;
$finalDa = preg_split('/[  ]/',$datos['fecha'])[1];
$calc = ((date('H') - preg_split('/[:]/',$finalDa)[0]));
if($calc == 0){
    $calc = $datos['valor'];
}
else{
    $calc *= $datos['valor'];
}
?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table
         {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
            padding: 5px;
        }

        td.precio {
            text-align: right;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ticket centrado">
        <h1>PARQUEADERO CHUCURI</h1>
        <h2>Ticket de venta #<?= $_GET['id']?></h2>
        <h2><?= date("d-m-Y H:i:s") ?></h2>
        <?= $calc ?>
        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad"> TIPO </th>
                    <th class="producto"> PLACA </th>
                    <th class="precio"> $$ </th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="cantidad"> <?= $datos['tipo_veh'] ?> </td>
                        <td class="producto"> <?= $datos['placa'] ?> </td>
                        <td class="precio"> <?= $datos['valor'] ?>$</td>
                    </tr>
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL: <?= $calc ?></strong>
                </td>
                <td class="precio">
                    
                </td>
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br>parzibyte.me</p>
    </div>
</body>

</html>
<?php $html = ob_get_clean();