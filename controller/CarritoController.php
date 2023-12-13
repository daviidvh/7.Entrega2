<?php 

require_once 'controller/Controller.php';

class CarritoController{
    public static function index(){
        include 'view/private/carrito/index.php';

    }

    public static function create(){
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
    
            if (!isset($_SESSION['carrito']['user'])) {
                $_SESSION['carrito']['user'] = array();
            }
    
            // Extraemos los id de los coches en una columna 
            $cocheExistente = array_column($_SESSION['carrito']['user'], 'id');
            //Comprobamos que no existe el id en la columna de coches existentes
            if (!in_array($id, $cocheExistente)) {
                // Obtén el próximo índice numérico disponible en el carrito
                $nextIndex = count($_SESSION['carrito']['user']) + 1;
    
                $_SESSION['carrito']['user'][$nextIndex] = [
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
        foreach ($_SESSION['carrito']['user'] as $key => $value) {
            if($value['id'] == $id){
                unset($_SESSION['carrito']['user'][$key]);
            }
        }

        include 'view/private/carrito/index.php';


    }

}

?>