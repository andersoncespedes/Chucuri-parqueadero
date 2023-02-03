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
    <link rel="stylesheet" href= "./node_modules/icofont/dist/icofont.css">
    <link rel="stylesheet" href= "./src/styles/style.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <header>
    <div class="headP">
            <h3><b style="color:rebeccapurple"> Parqueadero</b> <b style="color:red">Chucuri</b> </h3>
        </div>
        <nav> 
                <ul>
                    <li><a href=""><span class="icofont-home"></span>Home</a></li>
                    <li><a href="vistas/factura.php"><span class="icofont-ticket"></span>Factura</a></li>
                    <li><a href="vistas/stats.php"><span class="icofont-macbook"></span>Desktop</a></li>
                    <li style="float: right;"><a href="" id="hora" ></a></li>
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
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($row = $x->fetch()) {?>
                        <tr>
                            <td><?=$id?></td>
                            <td id= "veh"><?=$row['tipo_veh']?></td>
                            <td><?=$row['placa']?></td>
                            <td>
                                <a href="controller/AutoController.php?eliminar&id=<?=$row['id_auto']?>" class="btn btn-danger">Eliminar</a>
                                <a href="vistas/modificar_auto.php?id=<?=$row['id_auto']?>" class="btn btn-success">Modificar</a>
                            </td>
                        </tr>
                    <?php $id++; } 
                    $x->closeCursor();
                    ?>
                </tbody>
            </table>
            <a href="vistas/ingresar_autos.php" class="btn btn-success">Ingresar Datos</a>
    </div>
       
    </main>
    <?php require_once 'vistas/footer.php' ?>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script>
    let m = true;
    </script>
    <script src="src/javascript/dataTable.js"></script>
    <script src="src/javascript/main.js"></script>
    
</body>
</html>