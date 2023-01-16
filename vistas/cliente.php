<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/ClienteController.php';
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "../node_modules/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href= "../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../src/styles/style.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <header>
        <nav> 
                <ul>
                    <li><a href="../">Home</a></li>
                    <li><a href="">Carros</a></li>
                    <li><a href="">Cliente</a></li>
                </ul>
        </nav>
    </header>
    <main class="container" >
    <div class="table-container">
        <div class="titulo-tabla">
            <h2>Lista de Clientes</h2>
        </div>
            <table id = "table" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Auto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($row = $x->fetch()) {?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$row['nombres']?></td>
                            <td><?=$row['apellidos']?></td>
                            <td><?=$row['cedula']?></td>
                            <td><?=$row['id_auto']?></td>
                        </tr>
                    <?php $id++; } ?>
                </tbody>
            </table>
    </div>
       
    </main>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
</body>
</html>