<?php

require_once 'autoload.php';
require_once 'controller/AuthController.php';
require_once 'controller/FlotaController.php';
require_once 'controller/CarritoController.php';
require_once 'controller/AlquilerController.php';
require_once 'Router.php';

session_start();

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Ahora las variables de entorno están disponibles para usar
$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
     

$route = new Router();
$route->get('/',[IndexController::class,'index'])

      ->get('/login', [AuthController::class, 'login'])
      ->get('/register', [AuthController::class, 'register'])
      ->post('/doRegister', [AuthController::class, 'doRegister'])
      ->post('/doLogin', [AuthController::class, 'doLogin'])
      ->get('/home', [AuthController::class, 'home'])
      ->get('/flota', [AuthController::class, 'flota'])
      ->get('/logout', [AuthController::class, 'logout'])

      ->get('/create',[FlotaController::class, 'create'])
      ->post('/save',[FlotaController::class, 'save'])
      ->get('/edit-coche',[FlotaController::class, 'edit'])
      ->post('/update-coche',[FlotaController::class, 'update'])
      ->get('/destroy-coche',[FlotaController::class, 'destroy'])
      
      ->get('/ver-carrito',[CarritoController::class, 'index'])
      ->post('/alquilar-coche',[CarritoController::class, 'create'])
      ->get('/destroy-alquiler',[CarritoController::class, 'destroy'])

      
      ->get('/historial-coches',[AlquilerController::class, 'create'])
      ->get('/mis-alquileres',[AlquilerController::class, 'index'])
      ->get('/alquilados',[AlquilerController::class, 'indexAdmin']);


$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>