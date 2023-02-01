<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/AutoController.php';
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>
        <div style="width:100%; text-align:center">
            <h2>Datos de Factura</h2>
        </div>
    <main class="container d-flex justify-content-center" >
        <div class="card col-md-9 " style="padding: 10px; margin-bottom:10px">
                <form action="../controller/AutoController.php" method="POST" name = "form" target="_blank" class="d-flex">
                    <div id= "veh-form" class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipo de Parqueamiento</label>
                            <select name="tip_parq" id="" class="form-control" >
                                <option value="Diario">Diario</option>
                                <option value="Mensual">Mensual</option>
                                <option value="Hora">Hora</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="">Tipo de Vehiculo</label>
                            <select name="tipo" id="" class="form-control" >
                                <option value="Moto">Moto</option>
                                <option value="Carro">Carro</option>
                                <option value="Bus">Bus</option>
                                <option value="Camion">Camion</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                        <label for="">Placa</label>
                            <input type="text" name="placa" id="placa"  class="form-control "  placeholder="PLACA" required> 
                        </div><br>
                        <button type="button" id="siguiente" style="float: right;" class="btn btn-info">siguiente</button>
                    </div>
                    <div id="clien-form" style="display: none;" class="col-md-6"> 
                        <div class="form-group">
                            <label for="">Entrada</label>
                            <input type="datetime-local" name="entrada" id="entrada" class="form-control">
                            <input type="checkbox" class="form-check-input" id="hoy">
                            <label for="">Hoy</label>
                        </div><br>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" value="Subir" name="ingresar" id="in" class="btn btn-success col-md-6 ">
                        </div>
                    </div>
                    <div class="monto col-md-6" >
                        <label for="">Monto</label>
                        <input type="number" id = "monto" name="monto"  class="form-control" >
                        <label for="">Placa</label>
                        <input type="text" id="plac_sh" class="col-md-12 placa" disabled>
                    </div>
                </form>    
            
        </div>
    </main>
    <?php require_once 'footer.php' ?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../src/javascript/dataTable.js"></script>
    <script src="../src/javascript/main.js"></script>
</body>
</html>