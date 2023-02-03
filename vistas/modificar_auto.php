<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/AutoController.php';
$result = $auto->searchById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once './header.php' ?>
    <main class="container">
    <div class="card text-center col-md-4" style="margin:auto">
  <div class="card-header">
        <h3 class="card-title">Modificar Auto</h3>
    </div>
    <div class="card-body">
    <form action="../controller/AutoController.php?id=<?=$_GET['id']?>&modificar" method="POST" name="form1">
        <div class="form-group">
            <label for="">Placa</label>
            <input type="text" class="form-control" value="<?=$result['placa']?>" name="placa">
        </div>
        
        <div class="form-group">
            <label for="">Tipo de Vehiculo</label>
            <select name="tipo" id="" class="form-control">
                <option value="Moto">Moto</option>
                <option value="Carro">Carro</option>
                <option value="Bus">Bus</option>
                <option value="Camion">Camion</option>
            </select>
        </div>
        <br>
        <input type="submit" value="Editar" class="btn btn-primary">
    </form>
  </div>
</div>
    </main>
    <?php require_once 'footer.php' ?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
    <script src="../src/javascript/main.js"></script>
</body>
</html>