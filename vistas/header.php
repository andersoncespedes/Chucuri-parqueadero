<?php 
include_once $_SERVER['DOCUMENT_ROOT'] .'/Ticket/controller/FacturaController.php';
$id = 1;
?>
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
                    <li><a href="./factura.php">Factura</a></li>
                    <li style="float: right;"><a href="" id="hora" ></a></li>
                </ul>
        </nav>
    </header>