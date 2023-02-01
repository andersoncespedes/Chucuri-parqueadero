<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/FacturaController.php';
$id = 1;
$x = $factura->stats();
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>

    <main class="container" >
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="text-align: center;">
            <h1 class="h3 mb-0 text-gray-800">Numero de elementos guardados</h1>
        </div><hr class="sidebar-divider my-0"><br>
        <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Numero de autos registrados
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['auto'] ?> Autos
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="icofont-car"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Numero de facturas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['factura'] ?> Facturas
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="icofont-ticket"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero de facturas activas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['facturaAct'] ?> Facturas
                                    </div>
                                </div>
                                <div class="col-auto">
                                    s
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero de facturas inactivas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['facturaInact'] ?> Facturas
                                    </div>
                                </div>
                                <div class="col-auto">
                                    s
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="text-align: center;">
            <h1 class="h3 mb-0 text-gray-800">Ganancias</h1>
        </div><hr class="sidebar-divider my-0"><br>
        <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ganancias de hoy
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $factura->gainsByDay() === null ? 0 : $factura->gainsByDay()?>$
                                    </div>
                                </div>
                                <div class="col-auto">
                                   <b>$$</b> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ganancias del mes
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $factura->gainsByMonth()?>$
                                    </div>
                                </div>
                                <div class="col-auto">
                                   <b>$$</b> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
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