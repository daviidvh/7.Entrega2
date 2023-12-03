<?php
require_once 'Controller.php';
require_once 'model/User.php';

class AuthController
{
    public static function login()
    {
        include 'view/auth/login.php';
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
    }

    public static function flota(){
        if(isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1){
            include 'view/private/flotasAdmin/index.php';
        }else if(!isset($_SESSION['user'])){
            header('Location: ?controller=auth&function=login');
        }    
    }
  
    public static function home(){
        if(isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 2){
            include 'view/private/flotasUser/index.php';
        }else if(!isset($_SESSION['user'])){
            header('Location: ?controller=auth&function=login');
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
                    header('Location: ?controller=auth&function=flota');
                    break;
                case 2:
                    header('Location: ?controller=auth&function=home');
                    break;
                default:
                    # En este caso no debería entrar nunca (teoricamente)
                    header('Location: ?controller=auth&function=login');
                    break;
            }
        } else {
            echo '<script language="javascript">alert("Error Usuario no encontrado o contraseña incorrecta");</script>';
            header('Location: ?controller=auth&function=login');
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
            # ¿Que pasa si store no se ejecuta correctamente y no muestra error?

            header('Location: ?controller=auth&function=login');
        } else {
            $error = 'No coinciden';
            header('Location: ?controller=auth&function=register');
        }
    }

    public static function logout(){
        if(session_id()){
            session_destroy();
        }
        header('Location: ?controller=auth&function=login');   
    }
}
