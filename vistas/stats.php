<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/EstadisController.php';
$id = 1;
$x = $factura->stats();
$tt=  $factura->tipoVeh(); 
$tipoVehC = [];
$tipoVeh = [];
          while ($row = $tt->fetch()) {
            array_push( $tipoVehC, $row['tipo']);
            array_push( $tipoVeh, $row['tipo_veh']);
        }
        $tt->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'header.php' ?>

    <main class="container" >
        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
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
                                    <?= $x['dia'] === null ? 0 : $x['dia']?>$
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
                                    <?= $x['mes'] === null ? 0 : $x['mes']?>$
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
                                    Ganancias del Año
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['year'] === null ? 0 : $x['year']?>$
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
                                    Ganancias Generales
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $x['general'] === null ? 0 : $x['general']?>$
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
        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <h1 class="h3 mb-0 text-gray-800">Tipos de Vehiculos</h1>
        </div><hr class="sidebar-divider my-0"><br>
        <div class="contCanvas" >
            <canvas id="vehiculos"></canvas>
        </div><br>
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
                <div class="col-xl-3 col-md-6 mb-4" >
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
    </main>
   
    <?php require_once 'footer.php' ?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/chart.js/dist/chart.umd.js"></script>

    <script>
        const ctx = document.getElementById('vehiculos');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [<?php 
                array_map(function($r){
                    echo "'" .$r. "'," ;
                }, $tipoVeh)
                ?>],
            datasets: [{
                label: '# de vehiculos',
                data: 
                    [<?php 
                array_map(function($r){
                    echo  $r ."," ;
                }, $tipoVehC)
                ?>,
                ],
               
                backgroundColor: ['#925aef', '#85ef5a', '#ef5a5a', '#ef5ad6'],
                borderWidth: 1,
                
            }],
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
</script>
<script src="../src/javascript/main.js"></script>
</body>
</html>