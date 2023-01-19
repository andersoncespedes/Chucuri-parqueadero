<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/ClienteController.php';
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>
    <main class="container d-flex justify-content-center" >
        <div class="card col-md-6 " style="padding: 10px;margin-top:10px ; margin-bottom:10px">
            <div class="col-md-12 " >
                <form action="../controller/AutoController.php" method="POST" name = "form">
                    <div id= "veh-form">
                        <h2>Datos del Carro</h2>
                        <div class="form-group">
                            <label for="">Tipo de Parqueamiento</label>
                            <select name="tip_parq" class="form-control" id="">
                                <option value="Diario">Diario</option>
                                <option value="Mensual">Mensual</option>
                                <option value="Fijo">Fijo</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="">Tipo de Vehiculo</label>
                            <select name="tipo" id="" class="form-control">
                                <option value="Moto">Moto</option>
                                <option value="Carro">Carro</option>
                                <option value="Bus">Bus</option>
                                <option value="Camion">Camion</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                        <label for="">Placa</label>
                            <input type="text" name="placa" id="placa" class="col-md-12"  placeholder="PLACA" required> 
                        </div><br>
                        <button type="button" id="siguiente" style="float: right;">siguiente</button>
                    </div>
                    <div id="clien-form" style="display: none;"> 
                        <div class="form-group">
                        <label for="">Nombre</label>
                            <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre" required> 
                        </div><br>
                        <div class="form-group">
                        <label for="">Apellido</label>
                            <input type="text" name="apellido" id="" class="form-control" placeholder="Apellido" required> 
                        </div><br>
                        <div class="form-group">
                        <label for="">Cedula</label>
                            <input type="number" name="cedula" id="" class="form-control" placeholder="Cedula" required> 
                        </div><br>
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <textarea name="direccion" id="" cols="10" rows="5"  class="form-control" required></textarea>
                        </div><br>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" value="Subir" name="ingresar" id="in" class="btn btn-success col-md-6 ">
                        </div>
                    </div>
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