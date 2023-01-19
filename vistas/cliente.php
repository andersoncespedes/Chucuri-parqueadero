<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/ClienteController.php';
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>

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
                    <?php $id++; } 
                    $x->closeCursor();
                    ?>
                </tbody>
            </table>
    </div>
    </main>
    <?php require_once 'footer.php' ?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script>let m = false;</script>
    <script src="../src/javascript/dataTable.js"></script>
    <script src="../src/javascript/main.js"></script>
</body>
</html>