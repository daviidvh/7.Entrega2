<?php

require_once 'db/Database.php';
require_once 'model/Model.php';

class Flota implements Model
{
    private $marca;
    private $modelo;
    private $matricula;
    private $capacidad;
    private $tipo;
    private $precio;
    private $reservado;

    public function __construct(){}

    /**
     * Get the value of marca
     */
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self {
        $this->marca = $marca;
        return $this;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo() {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     */
    public function setModelo($modelo){
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * Get the value of matricula
     */
    public function getMatricula() {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     */
    public function setMatricula($matricula): self {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * Get the value of capacidad
     */
    public function getCapacidad() {
        return $this->capacidad;
    }

    /**
     * Set the value of capacidad
     */
    public function setCapacidad($capacidad): self {
        $this->capacidad = $capacidad;
        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
        return $this;
    }

        /**
     * Get the value of reservado
     */
    public function getReservado() {
        return $this->reservado;
    }

    /**
     * Set the value of reservado
     */
    public function setReservado($reservado) {
        $this->reservado = $reservado;
        return $this;
    }
    public function findAll() : PDOStatement
    {
        /**
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
        $db = Database::conectar();
        $query = "SELECT * FROM flota";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    /**
     * Funcion para buscar coches no reservados es decir para los usuarios
     */
    public function findNoReservados() : PDOStatement
    {
        /**
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
        $db = Database::conectar();
        $query = "SELECT * FROM flota WHERE reservado='No'";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }


    public function findById($id)
    {
        $db = Database::conectar();
        $query = "SELECT * FROM flota WHERE id=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
       $query= "INSERT INTO flota (".implode(",",array_keys($datos)).")VALUES ('".implode("','",array_values($datos))."')";
       $db = Database::conectar();
       $db-> exec($query);
       $db = Database::desconectar();
    }

    public function updateById($id){
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $matricula=$_POST['matricula'];
        $capacidad =$_POST['capacidad'];
        $tipo=$_POST['tipo'];
        $precio=$_POST['precio'];
        $reservado=$_POST['reservado'];

            $db= Database::conectar(); //Conexion BD
            $query = "
            UPDATE flota
            SET marca = '$marca', 
                modelo = '$modelo', 
                matricula = '$matricula', 
                capacidad = $capacidad, 
                tipo = '$tipo', 
                precio = '$precio', 
                reservado = '$reservado'
            WHERE id = $id;
        ";
            var_dump($query);
            $db->query($query);
            $db = Database::desconectar();

    }


    public function updateReservaById($id){
        $db = Database::conectar();
        $query = "UPDATE flota SET reservado = 'Si' WHERE id = $id";
        $result = $db->exec($query);
        $db = Database::desconectar();
    }
    

    public function destroyById($id):void
    {
        $db= Database::conectar(); //Conexion BD
        $query = "DELETE FROM flota WHERE id =$id";
        $db->exec($query);
        $db = Database::desconectar();
    }


}

?>