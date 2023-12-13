<?php 
require_once 'model/Alquiler.php';
class AlquilerController{


    public static function index(){
        $email=$_SESSION['user']['email'];
        $alquiler = new Alquiler();
        $alquiler = $alquiler->findByEmail($email)->fetchAll();
        include 'view/private/alquiler/historial.php';

    }
        public static function indexAdmin(){
            $alquiler = new Alquiler();
            $alquiler = $alquiler->findAll()->fetchAll();
        include 'view/private/alquiler/alquilados.php';

    }

    public static function create(){
        $idCoche = $_GET['id'];
        $flota = new Flota();

        $result = $flota->updateReservaById($idCoche);
        $flota = new Flota;
        $coche = $flota->findById($idCoche)->fetchAll();

        foreach ($_SESSION['carrito']['user'] as $key => $value) {
            if ($value['id'] == $idCoche) {
                $dias=$value['dias'];
                $precio_total = $value['precio_total'];
            }
        }
        $email=$_SESSION['user']['email'];
        foreach ($coche as $value) {
                $id = $value['id'];
                $marca = $value['marca'];
                $modelo = $value['modelo'];
                $matricula = $value['matricula'];
                $capacidad = $value['capacidad'];
                $tipo = $value['tipo'];
                $reservado = $value['reservado'];
        }

        $datos = array();
        /**
         * Comprobacion de que no esten vacios para hacer el insert
         */
        if (isset($id) && !empty($id)) {
           $datos['id'] = $id;
        }
        if (isset($marca) && !empty($marca)) {
            $datos['marca'] = $marca;
         }
        if (isset($modelo) && !empty($modelo)) {
            $datos['modelo'] = $modelo;
         }
        if (isset($matricula) && !empty($matricula)) {
           $datos['matricula'] = $matricula;
        }
        if (isset($capacidad) && !empty($capacidad)) {
           $datos['capacidad'] = $capacidad;
        }
        if (isset($tipo) && !empty($tipo)) {
           $datos['tipo'] = $tipo;
        }
        if (isset($reservado) && !empty($reservado)) {
           $datos['reservado'] = $reservado;
        }
        if (isset($precio_total) && !empty($precio_total)) {
            $datos['precio_total'] = $precio_total;
         }        
         if (isset($dias) && !empty($dias)) {
            $datos['dias'] = $dias;
         }
         if (isset($email) && !empty($email)) {
            $datos['email'] = $email;
         }
  
            $alquiler = new Alquiler();
            $alquiler->store($datos);
         

        /**
         * Borro del carrito
         */

        foreach ($_SESSION['carrito']['user'] as $key => $value) {
            if($value['id'] == $id){
                unset($_SESSION['carrito']['user'][$key]);
            }
        }
  
        header('Location: mis-alquileres');

    }
}
?>