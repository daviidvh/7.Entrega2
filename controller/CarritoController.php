<?php 

require_once 'controller/Controller.php';

class CarritoController{
    public static function index(){
        include 'view/private/carrito/index.php';

    }

    public static function create(){
        $idUser=$_SESSION['user']['id'];
        if (isset($_POST['dias'], $_GET['id'])) {
            $coche = new Flota();
            $coche = $coche->findById($_GET['id'])->fetchAll();
    
            foreach ($coche as $value) {
                $id = $value['id'];
                $marca = $value['marca'];
                $modelo = $value['modelo'];
                $capacidad = $value['capacidad'];
                $tipo = $value['tipo'];
                $precio = $value['precio'];
            }
    
            if (!isset($_SESSION['carrito'][$idUser])) {
                $_SESSION['carrito'][$idUser] = array();
            }
    
            // Extraemos los id de los coches en una columna 
            $cocheExistente = array_column($_SESSION['carrito'][$idUser], 'id');
            //Comprobamos que no existe el id en la columna de coches existentes
            if (!in_array($id, $cocheExistente)) {
                // Obtén el próximo índice numérico disponible en el carrito
                $nextIndex = count($_SESSION['carrito'][$idUser]) + 1;
    
                $_SESSION['carrito'][$idUser][$nextIndex] = [
                    'id' => $id,
                    'marca' => $marca,
                    'modelo' => $modelo,
                    'capacidad' => $capacidad,
                    'tipo' => $tipo,
                    'precio' => $precio,
                    'dias' => $_POST['dias'],
                    'precio_total' => $precio * $_POST['dias'],
                ];
            }else{
                echo("Coche ya añadido");
            }
        }
    
        include 'view/private/carrito/index.php';
    }
    
    public static function destroy($id){

        $id= $_GET['id'];
        $idUser=$_SESSION['user']['id'];

        foreach ($_SESSION['carrito'][$idUser] as $key => $value) {
            if($value['id'] == $id){
                unset($_SESSION['carrito'][$idUser][$key]);
            }
        }

        include 'view/private/carrito/index.php';


    }

}

?>