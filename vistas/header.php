
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "../node_modules/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href= "../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../node_modules/icofont/dist/icofont.css">
    <link rel="stylesheet" href= "../src/styles/style.css">
    
    <title><?= APP_NAME ?></title>
</head>
<body>
    <header>
        <div class="headP">
            <h3 style="font-style: arial;"><b style="color:rebeccapurple"> Parqueadero</b> <b style="color:red">Chucuri</b> </h3>
        </div>
        
        <nav> 
                <ul>
                    <li><a href="../"><span class="icofont-home"></span>Home</a></li>
                    <li><a href="./factura.php"><span class="icofont-ticket"></span> Factura</a></li>
                    <li><a href="./stats.php"><span class="icofont-macbook"></span>Desktop</a></li>
                    <li style="float: right;"><a href="" id="hora" ></a></li>
                </ul>
        </nav>
    </header>