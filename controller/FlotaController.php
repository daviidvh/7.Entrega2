<?php
require_once 'controller/Controller.php';
require_once 'model/Flota.php';

class FlotaController implements Controller
{
   # Funcion abstracta index que muestra todos los elementos (tabla)
   public static function index()
   {
      /**
       * Para hacer la primera insercion
       */
      //$db= Database::conectar();
      //var_dump("Conectado");
      //Database::iniciarTablas($db);
      $flota = new Flota();

      $flota = $flota->findAll()->fetchAll();
      require 'view/private/flotasAdmin/index.php';
   }

   # Funcion abstracta create que muestra un formulario para agregar un elemento
   public static function create()
   {
      require 'view/private/flotasAdmin/create.php';
   }



   # Funcion abstracta save que inserta en la BD los elementos recogidos del formulario
   public static function save()
   {
      $datos = array();
      if (isset($_POST['marca']) && !empty($_POST['marca'])) {
         $datos['marca'] = $_POST['marca'];
      }
      if (isset($_POST['modelo']) && !empty($_POST['modelo'])) {
         $datos['modelo'] = $_POST['modelo'];
      }
      if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
         $datos['matricula'] = $_POST['matricula'];
      }
      if (isset($_POST['capacidad']) && !empty($_POST['capacidad'])) {
         $datos['capacidad'] = $_POST['capacidad'];
      }
      if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
         $datos['tipo'] = $_POST['tipo'];
      }
      if (isset($_POST['precio']) && !empty($_POST['precio'])) {
         $datos['precio'] = $_POST['precio'];
      }
      if (isset($_POST['reservado']) && !empty($_POST['reservado'])) {
         $datos['reservado'] = $_POST['reservado'];
      }

      //Envio al modelo

      $flota = new Flota();
      $flota->store($datos);

      header('Location: flota');
   }

   public static function edit($id)
   {
      $id = $_GET['id'];
      $flota = new Flota;
      $flota = $flota->findById($id)->fetchAll();
      require 'view/private/flotasAdmin/edit.php';
   }

   public static function update($id)
   {
      $id= $_GET['id'];
      $flota = new Flota();
      $flota->updateById($id);
      header('Location: flota');
   }

   public static function destroy($id)
   {
      $id= $_GET['id'];
      $flota = new Flota();
      $flota->destroyById($id);
      header('Location: flota');
   }





 
   
}
