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
    <main class="container d-flex justify-content-center" >
        <div class="card col-md-5 " style="padding: 10px;">
            <div class="col-md-12 ">
                <form action="../controller/AutoController.php" method="POST" name = "form">
                    <div class="form-group">
                        <label for="">Marca</label>
                        <select name="tipo" id="" class="form-control">
                            <option value="Moto">Moto</option>
                            <option value="Carro">Carro</option>
                            <option value="Bus">Bus</option>
                            <option value="Camion">Camion</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                       <label for="">Placa</label>
                        <input type="text" name="placa" id="" class="form-control" placeholder="Placa" maxlength = "6"> 
                    </div><br>
                    <div class="form-group">
                       <label for="">Nombre</label>
                        <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre" maxlength = "6"> 
                    </div><br>
                    <div class="form-group">
                       <label for="">Apellido</label>
                        <input type="text" name="apellido" id="" class="form-control" placeholder="Apellido" maxlength = "6"> 
                    </div><br>
                    <div class="form-group">
                       <label for="">Cedula</label>
                        <input type="text" name="cedula" id="" class="form-control" placeholder="Cedula" > 
                    </div><br>
                    <div class="form-group" style="text-align: center;">
                        <input type="submit" value="Subir" name="ingresar" id="in" class="btn btn-success col-md-6 ">
                    </div>
                </form>    
            </div>
        </div>
    </main>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
    <script src="../src/javascript/main.js"></script>
</body>
</html>