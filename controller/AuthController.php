<?php
require_once 'model/User.php';

class AuthController
{
    public static function login()
    {
        include 'view/auth/login.php';
       
        if(isset($_SESSION['mensaje'])) {
            unset($_SESSION['mensaje']);
        }
        /**
         * Para hacer la primera insercion
         */
        //$db= Database::conectar();
        //var_dump("Conectado");
        //Database::iniciarTablas($db);
    }

    public static function register()
    {
        include 'view/auth/register.php';
        if(isset($_SESSION['mensaje'])) {
            unset($_SESSION['mensaje']);
        }
    }

    /**
     * Vista ADMINISTRADOR todos
     */
    public static function flota(){
        $flota = new Flota();
        $flota = $flota->findAll()->fetchAll();


        if(isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1){
            include 'view/private/flotasAdmin/index.php';
        }else if(!isset($_SESSION['user'])){
            $_SESSION['mensaje'] = 'No tienes permisos para acceder';
            header('Location: login');
            if(isset($_SESSION['mensaje'])) {
                unset($_SESSION['mensaje']);
            }
        }    
    }
  
    /**
     * Vista USUARIO coches no alquilados 
     */
    public static function home(){
        $flota = new Flota();

        $flota = $flota->findNoReservados()->fetchAll();

        if(isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 2){
            include 'view/private/flotasUser/index.php';
        }else if(!isset($_SESSION['user'])){
            header('Location: login');
        }    
    }

    public static function doLogin()
    {
        // Recogemos el email y la password

        $email = $_POST['email'];
        $password = $_POST['password'];

        //Creamos el objeto de usuario
        $user = new User();
        $user_log = $user->findByEmail($email)->fetch();
        //password_verify para la encriptacion
        if (password_verify($password, $user_log['password'])) {
            $_SESSION['user'] = $user_log;
            switch($user_log['rol_id']){
                case 1:
                    header('Location: flota');
                    break;
                case 2:
                    header('Location: home');
                    break;
                default:
                    # En este caso no debería entrar nunca (teoricamente)
                    header('Location: login');
                    break;
            }
        } else {
            $_SESSION['mensaje'] = 'Error de credenciales. No son correctas';
            header('Location: login');
        }
    }

    public static function doRegister()
    {

        if ($_POST['password'] === $_POST['password-verify']) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cont' => 4]);


            $user = new User();
            $datos = array(
                'email' => $email,
                'password' => $password
            );
            $user->store($datos);

            header('Location: login');
        } else {
            $_SESSION['mensaje'] = 'No coinciden';
            header('Location: register');

        }
    }

     public static function logout(){
         if(isset($_SESSION['user'])){

             //session_destroy();
             unset($_SESSION['user']);
         }
         header('Location: login');   
     }


}
