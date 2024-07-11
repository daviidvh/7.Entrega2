<?php 
require_once 'db/Database.php';
require_once 'model/Model.php';

class User implements Model{

    private $id;
    private $email;
    private $password;
    private $rol;

    public function __construct(){}

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Get the value of password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Get the value of rol
     */
    public function getRol() {
        return $this->rol;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self {
        $this->password = $password;
        return $this;
    }

    /**
     * Set the value of rol
     */
    public function setRol($rol): self {
        $this->rol = $rol;
        return $this;
    }


    public function findAll(){

        $db = Database::conectar();
        $query = "SELECT * FROM users";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;

    }

    public function findById($id){

        $query = "SELECT * FROM users WHERE id = $id";
        $db = Database::conectar();
        $user = $db->query($query);
        $db = Database::desconectar();
        return $user;

    }

    public function store($datos){
        $query = "INSERT INTO users (".implode(",",array_keys($datos)).", rol_id) VALUES ('".implode("','",array_values($datos))."', 2)";
        # Conectar a la base de datos, ejecutar y desconectar.
         $db = Database::conectar();
         $db->exec($query);
         $db = Database::desconectar();
    }

    public function findByEmail($email){

        $query = "SELECT * FROM users WHERE email ='$email'";
        $db = Database::conectar();
        $user = $db->query($query);
        $db = Database::desconectar();
        return $user;
    }

    public function updateById($id){

    }

    public function destroyById($id){
        $db = Database::conectar();
        $query = "DELETE FROM users WHERE id = $id";
        $db->exec($query);
        $db = Database::desconectar();
    }
}


?>