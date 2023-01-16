<?php 
include_once __DIR__ .'/controller/AutoController.php';
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./node_modules/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href= "./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href= "./src/styles/style.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <header>
        <nav> 
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Carros</a></li>
                    <li><a href="vistas/cliente.php">Cliente</a></li>
                </ul>
        </nav>
    </header>
    <main class="container" >
    <div class="table-container">
        <div class="titulo-tabla">
            <h2>Lista de Autos</h2>
        </div>
            <table id = "table" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Placa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($row = $x->fetch()) {?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$row['tipo_veh']?></td>
                            <td><?=$row['placa']?></td>
                        </tr>
                    <?php $id++; } ?>
                </tbody>
            </table>
            <a href="vistas/ingresar_autos.php" class="btn btn-success">Ingresar Datos</a>
    </div>
       
    </main>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="src/javascript/dataTable.js"></script>
</body>
</html>