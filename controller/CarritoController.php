<?php 

require_once 'Controller.php';

class CarritoController implements Controller{
    public static function index(){
        include 'view/private/carrito/index.php';

    }

    # Funcion abstracta create que muestra un formulario para agregar un elemento
    public static function create(){
        var_dump($_POST['dias']);
        var_dump($_SESSION['user']);
        
        if(isset($_POST['dias'],$_GET['id'])){
            $coche = new Flota();
            $coche = $coche->findById($_GET['id'])->fetchAll();
    
            foreach($coche as $key => $value){
                $id = $value['id'];
                $marca = $value['marca'];
                $modelo = $value['modelo'];
                $capacidad = $value['capacidad'];
                $tipo = $value['tipo'];
                $precio = $value['precio'];
            }
    
            if (!isset($_SESSION['user']['carrito'])) {
                $_SESSION['user']['carrito'] = array();
            }
    
            var_dump($_SESSION['user']['carrito']);
         
            // Obtén el próximo índice numérico disponible en el carrito
            $nextIndex = count($_SESSION['user']['carrito']) + 1;
    
            $_SESSION['user']['carrito'][$nextIndex] = [
                'id' => $id,
                'marca' => $marca,
                'modelo' => $modelo,
                'capacidad' => $capacidad,
                'tipo' => $tipo,
                'precio' => $precio,
                'dias' => $_POST['dias'],
                'precio_total' => $precio * $_POST['dias'],
            ];
        }
    
        include 'view/private/carrito/index.php';
    }
    

    # Funcion abstracta save que inserta en la BD los elementos recogidos del formulario
    public static function save(){

    }

    # Funcion abstracta edit que recibe un $id de un elemento y muestra un formulario con su datos
    public static function edit($id){

    }

    # Funcion abstracta update que recibe un $id de un elemento y actualiza su contenido
    public static function update($id){

    }

    # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
    public static function destroy($id){

    }
}

?>