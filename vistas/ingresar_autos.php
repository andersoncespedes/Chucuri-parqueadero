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
        <form action="../controller/AutoController.php" method="POST">
            <label for="">Marca</label>
            <select name="tipo" id="">
                <option value="Moto">Moto</option>
                <option value="Carro">Carro</option>
                <option value="Bus">Bus</option>
                <option value="Camion">Camion</option>
            </select>
            <label for="">Placa</label>
            <input type="text" name="placa" id="" placeholder="Placa" maxlength = "6">
            <input type="submit" value="Subir" name="ingresar">
        </form>
    </main>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
</body>
</html>