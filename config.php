<?php
 require __DIR__ . '/vendor/autoload.php';

 Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/')->load();

//datos de la aplicacion

define('APP_NAME', $_ENV['APP_NAME']);

//datos de la base de datos
date_default_timezone_set("America/Bogota");
define('DB_USER',   $_ENV['DB_USER']);
define('DB_NAME',   $_ENV['DB_NAME']);
define('DB_HOST',   $_ENV['DB_HOST']);
define('DB_PASSWD', $_ENV['DB_PASSWD']);
define('DB_PORT',   $_ENV['DB_PORT']);

define('STYLE', __DIR__. '/src/styles/style.css');







?>