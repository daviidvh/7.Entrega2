<?php

require_once 'controller/FlotaController.php';
require_once 'controller/AuthController.php';
require_once 'controller/CarritoController.php';

if(empty(session_id())){
   session_start();
}

/**
 * 1. Comprobar si existen variables en la URL
 * 2. Recoger esas variables de la URL.
 * 3. Llamar a la funcion correspondiente.
 */

 if(isset($_GET['controller']) && isset($_GET['function'])){
    // Existe controller y function
    $controller = $_GET['controller'];         
    $controller = $controller . 'Controller';  
    $controller = ucfirst($controller);        

    /**
     * Comprobamos
     * 1. Si existe la clase del controlador con el formato correcto.
     * 2. Si existe la funcion dentro del controlador con el formato correcto.
     * 
     * RESPUESTAS
     * - true: ejecutar la funcion correspondiente
     * - false: algo falla. Comprobar si he cargado la clase, si hay errores en los nombres o si existe 
     * realmente la funcion dentro del controlador.
     */
    if(class_exists($controller) && method_exists($controller, $_GET['function'])){
      if(isset($_GET['id'])){
         $id = $_GET['id'];
         call_user_func($controller. '::' . $_GET['function'], $id);

      }else{
        call_user_func($controller. '::' . $_GET['function']); // Funcion estatica PeliculasController::index,
    }
 }else{
    /**
     * Este es el caso en el que hay algun error en la URL o el caso en el que la URL esta vacia
     */
    include('view/error/404.php');
    echo 'ERROR: no existe la función que buscas en el controlador. Revisa tu proyecto'; }
}else{
   include 'view/index.php';
}
?>