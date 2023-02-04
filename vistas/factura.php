<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/FacturaController.php';
$id = 1;
$x = $factura->mostrarAct();
$z = $factura->mostrarInact();
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>

    <main class="container"  >
    <div class="table-container">
        
        <div class="titulo-tabla">
            <h2>Lista de Facturas</h2>
        </div>
        <div style="margin: 5px;">
            <button class="btn btn-info" id="activo">Activo</button>
            <button class="btn btn-warning" id = "inactivo">Inactivo</button> 
        </div>
        
        <div id="a">
            <table id = "table" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Entrada</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Valor Inicial</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($row = $x->fetch()) {?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$row['fecha']?></td>
                            <td><?=$row['tipo_veh']?></td>
                            <td><?=$row['placa']?></td>
                            <td><?=$row['valor']?></td>
                            <td><?=$row['estado']?></td>
                            <td>
                                <a href="../controller/FacturaController.php?imprimir&id=<?=$row['id_factura']?>" target="_blank" class="btn btn-success" >Imprimir</a>
                                <a href="../controller/FacturaController.php?eliminar&id=<?=$row['id_factura']?>" class="btn btn-danger">Anular</a>
                            </td>
                            
                        </tr>
                    <?php $id++; } 
                    $x->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
            
            <div id = "b" width = "100%" >
            <table id = "table" class="display"  width = "100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Valor Inicial</th>
                        <th>Estado</th>
                        <th>Monto Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $z->fetch()) {?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$row['fecha']?></td>
                            <td><?=$row['salida']?></td>
                            <td><?=$row['tipo_veh']?></td>
                            <td><?=$row['placa']?></td>
                            <td><?=$row['valor']?></td>
                            <td><?=$row['estado']?></td>
                            <td><?=$row['monto_tot']?></td>
                            <td>
                            <a href="../controller/FacturaController.php?eliminar&id=<?=$row['id_factura']?>" class="btn btn-danger">Anular</a>
                            </td>
                        </tr>
                    <?php $id++; } 
                    $z->closeCursor();
                    $z = null;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </main>
    <?php require_once 'footer.php'; 
    
    ?>
    <script>
        const activo = document.getElementById('a');
        const inactivo = document.getElementById('b');
        const activobtn = document.getElementById('activo');
        const inactivobtn = document.getElementById('inactivo');
    activobtn.addEventListener('click',function(){
        activo.style.display = "block";
        inactivo.style.display = "none";
    });
    inactivobtn.addEventListener('click',function(){
        activo.style.display = "none";
        inactivo.style.display = "block";
    });
    </script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
    <script src="../src/javascript/main.js"></script>
</body>
</html>