<?php
require_once 'db/Database.php';

class Alquiler{

    private $marca;
    private $modelo;
    private $matricula;
    private $capacidad;
    private $tipo;
    private $precio;
    private $reservado;
    private $dias;
    private $precioTotal;



    /**
     * Get the value of marca
     */
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca) {
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
    public function setModelo($modelo) {
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
    public function setMatricula($matricula) {
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
    public function setCapacidad($capacidad){
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
    public function setTipo($tipo){
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

    /**
     * Get the value of dias
     */
    public function getDias() {
        return $this->dias;
    }

    /**
     * Set the value of dias
     */
    public function setDias($dias) {
        $this->dias = $dias;
        return $this;
    }

    /**
     * Get the value of precioTotal
     */
    public function getPrecioTotal() {
        return $this->precioTotal;
    }

    /**
     * Set the value of precioTotal
     */
    public function setPrecioTotal($precioTotal){
        $this->precioTotal = $precioTotal;
        return $this;
    }





    public function findAll() : PDOStatement
    {
        $db = Database::conectar();
        $query = "SELECT * FROM alquilados";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }



    public function findByEmail($email){

        $query = "SELECT * FROM alquilados WHERE email ='$email'";
        $db = Database::conectar();
        $user = $db->query($query);
        $db = Database::desconectar();
        return $user;
    }

    public function store($datos){
        $query = "INSERT INTO alquilados (".implode(",",array_keys($datos)).") VALUES ('".implode("','",array_values($datos))."')";


        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    
}


?> 