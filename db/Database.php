 <?php
    /**
     * Esta clase se encarga de la conexion a la base de datos.
     * 
     * 1. funcion conectar(): realizar una conexion a la base de datos. 
     * 2. funcion desconectar() : realiza la desconexion a la base de datos.
     * 
     * - ¿De que forma realizamos la configuracion de la conexion a la base de datos?
     *  + nombre base de datos
     *  + ubicacion de la BD
     *  + puerto de la DB
     *  + usuario
     *  + password
     */

    //  class Database {

        /**
         * Realiza la conexion a la base de datos
         */
        // public static function conectar() : PDO{
        //     $db = new \PDO('sqlite:db/db.sqlite', '', '', array(
        //         \PDO::ATTR_EMULATE_PREPARES => false,
        //         \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        //         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        //      ));
        //      return $db;
        // }

        /**
         * Realiza la desconexion a la base de datos
         */
//         public static function desconectar(){
//             return null;
//         }

//         /**
//          * Funcion de prueba para iniciar una tabla con contenido.
//          */
//  public static function iniciarTablas($db) : void {
//         try {
//             // TABLA FLOTAS
//             $delete = "DROP TABLE IF EXISTS flota;";
//             $db->exec($delete);
//             echo "Tabla 'flota' eliminada<br>";

//             $query = "
//                 CREATE TABLE IF NOT EXISTS flota(
//                     id INTEGER PRIMARY KEY AUTOINCREMENT,
//                     marca TEXT,
//                     modelo TEXT,
//                     matricula TEXT,
//                     capacidad INTEGER,
//                     tipo TEXT,
//                     precio FLOAT,
//                     reservado TEXT CHECK (reservado IN ('Si', 'No'))
//                 )
//             ";
//             $db->exec($query);
//             echo "Tabla 'flota' creada<br>";

//             $insert = "
//                 INSERT INTO flota (marca, modelo, matricula, capacidad, tipo, precio, reservado) VALUES 
//                 ('Toyota', 'Corolla', '2598MBR', 5, 'automatico', 38.56,'Si'),
//                 ('BMW', 'X5', '5876JHB', 5, 'manual', 70.99,'No'),
//                 ('Cupra', 'Formentor', '4525KBT', 5, 'automatico', 50.55,'Si'),
//                 ('Mercedes-Benz', 'Clase V', '2359MBN', 7, 'automatico', 120.99,'No');
//             ";
//             $db->exec($insert);
//             echo "Datos insertados en 'flota'<br>";

//             // TABLA USUARIOS
//             $delete = "DROP TABLE IF EXISTS users;";
//             $db->exec($delete);
//             echo "Tabla 'users' eliminada<br>";

//             $query = "
//                 CREATE TABLE IF NOT EXISTS users(
//                     id INTEGER PRIMARY KEY AUTOINCREMENT,
//                     email TEXT,
//                     password TEXT,
//                     rol_id INTEGER
//                 )
//             ";
//             $db->exec($query);
//             echo "Tabla 'users' creada<br>";

//             $delete = "DROP TABLE IF EXISTS rol;";
//             $db->exec($delete);
//             echo "Tabla 'rol' eliminada<br>";

//             $query = "
//                 CREATE TABLE IF NOT EXISTS rol(
//                     id INTEGER PRIMARY KEY AUTOINCREMENT,
//                     nombre TEXT
//                 )
//             ";
//             $db->exec($query);
//             echo "Tabla 'rol' creada<br>";

//             $insert = "
//                 INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
//             ";
//             $db->exec($insert);
//             echo "Datos insertados en 'rol'<br>";

//             // TABLA ALQUILADOS
//             $delete = "DROP TABLE IF EXISTS alquilados;";
//             $db->exec($delete);
//             echo "Tabla 'alquilados' eliminada<br>";

//             $query = "
//                 CREATE TABLE IF NOT EXISTS alquilados(
//                     id_alquiler INTEGER PRIMARY KEY AUTOINCREMENT,
//                     id INTEGER,
//                     marca TEXT,
//                     modelo TEXT,
//                     matricula TEXT,
//                     capacidad INTEGER,
//                     tipo TEXT,
//                     dias INTEGER,
//                     precio_total FLOAT,
//                     email TEXT,
//                     reservado TEXT
//                 )
//             ";
//             $db->exec($query);
//             echo "Tabla 'alquilados' creada<br>";

//         } catch (\PDOException $e) {
//             echo "Error al iniciar las tablas: " . $e->getMessage();
//         }
//     }

//         public static function delete($db, $id) : int{
//             $query = "
//                 DELETE FROM flota WHERE id = $id;
//             ";

//             $filas = $db->exec($query);
//             return $filas;
//         }

//         public static function insert($db,$marca, $matricula, $capacidad, $tipo, $precio, $reservado) : void{
//             $query = "
//                 INSERT INTO flota (marca, modelo, matricula, capacidad, tipo, precio, reservado) VALUES 
//                 ('$marca', '$matricula', $capacidad, '$tipo', $precio, $reservado);
//             ";

//             $db->exec($query);
//         }

//         public static function select($db) : PDOStatement{
//             $query = "
//                 SELECT * FROM flota;
//             ";

//             $result = $db->query($query);
//             return $result;
//         }
//      }

// IMPLEMENTACION POSTGRESQL
/**
 * Esta clase se encarga de la conexion a la base de datos.
 * 
 * 1. funcion conectar(): realizar una conexion a la base de datos. 
 * 2. funcion desconectar() : realiza la desconexion a la base de datos.
 * 
 * - ¿De que forma realizamos la configuracion de la conexion a la base de datos?
 *  + nombre base de datos
 *  + ubicacion de la BD
 *  + puerto de la DB
 *  + usuario
 *  + password
 */

class Database {

    /**
     * Realiza la conexion a la base de datos
     */
    public static function conectar() : PDO {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $dbname = getenv('DB_NAME');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        try {
            $db = new \PDO($dsn, $username, $password, array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ));
            return $db;
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    /**
     * Realiza la desconexion a la base de datos
     */
    public static function desconectar() {
        return null;
    }

    /**
     * Funcion de prueba para iniciar una tabla con contenido.
     */
    public static function iniciarTablas($db) : void {
        try {
            // TABLA FLOTAS
            $delete = "DROP TABLE IF EXISTS flota;";
            $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS flota(
                    id SERIAL PRIMARY KEY,
                    marca TEXT,
                    modelo TEXT,
                    matricula TEXT,
                    capacidad INTEGER,
                    tipo TEXT,
                    precio FLOAT,
                    reservado TEXT CHECK (reservado IN ('Si', 'No'))
                )
            ";
            $db->exec($query);

            $insert = "
                INSERT INTO flota (marca, modelo, matricula, capacidad, tipo, precio, reservado) VALUES 
                ('Toyota', 'Corolla', '2598MBR', 5, 'automatico', 38.56,'Si'),
                ('BMW', 'X5', '5876JHB', 5, 'manual', 70.99,'No'),
                ('Cupra', 'Formentor', '4525KBT', 5, 'automatico', 50.55,'Si'),
                ('Mercedes-Benz', 'Clase V', '2359MBN', 7, 'automatico', 120.99,'No');
            ";
            $db->exec($insert);

            // TABLA USUARIOS
            $delete = "DROP TABLE IF EXISTS users;";
            $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS users(
                    id SERIAL PRIMARY KEY,
                    email TEXT,
                    password TEXT,
                    rol_id INTEGER
                )
            ";
            $db->exec($query);

            $delete = "DROP TABLE IF EXISTS rol;";
            $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS rol(
                    id SERIAL PRIMARY KEY,
                    nombre TEXT
                )
            ";
            $db->exec($query);

            $insert = "
                INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
            ";
            $db->exec($insert);

            // TABLA ALQUILADOS
            $delete = "DROP TABLE IF EXISTS alquilados;";
            $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS alquilados(
                    id_alquiler SERIAL PRIMARY KEY,
                    id INTEGER,
                    marca TEXT,
                    modelo TEXT,
                    matricula TEXT,
                    capacidad INTEGER,
                    tipo TEXT,
                    dias INTEGER,
                    precio_total FLOAT,
                    email TEXT,
                    reservado TEXT
                )
            ";
            $db->exec($query);

        } catch (\PDOException $e) {
            echo "Error al iniciar las tablas: " . $e->getMessage();
        }
    }

    public static function delete($db, $id) : int {
        $query = "DELETE FROM flota WHERE id = :id;";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function insert($db, $marca, $modelo, $matricula, $capacidad, $tipo, $precio, $reservado) : void {
        $query = "
            INSERT INTO flota (marca, modelo, matricula, capacidad, tipo, precio, reservado) VALUES 
            (:marca, :modelo, :matricula, :capacidad, :tipo, :precio, :reservado);
        ";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':capacidad', $capacidad, \PDO::PARAM_INT);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':reservado', $reservado);
        $stmt->execute();
    }

    public static function select($db) : PDOStatement {
        $query = "SELECT * FROM flota;";
        $result = $db->query($query);
        return $result;
    }
}
?>
