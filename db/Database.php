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

     class Database {

        /**
         * Realiza la conexion a la base de datos
         */
        public static function conectar() : PDO{
            $db = new \PDO('sqlite:db/db.sqlite', '', '', array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
             ));
             return $db;
        }

        /**
         * Realiza la desconexion a la base de datos
         */
        public static function desconectar(){
            return null;
        }

        /**
         * Funcion de prueba para iniciar una tabla con contenido.
         */
        public static function iniciarTablas($db) : void{
            /**
             * TABLA FLOTAS
             */
            $delete = "
                DROP TABLE IF EXISTS flota;

            ";

            $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS flota(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
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
                    ('Toyota', 'Corrolla', '2598MBR', 5, 'automatico', 38.56,'Si'),
                    ('BMW', 'X5', '5876JHB', 5, 'manual', 70.99,'No'),
                    ('Cupra', 'Formentor', '4525KBT', 5, 'automatico', 50.55,'Si'),
                    ('Mercedes-Benz', 'Clase V', '2359MBN', 7, 'automatico', 120.99,'No');

            ";

            $db->query($insert);

            /**
             * TABLAS USUARIOS
             */
            $delete="
                DROP TABLE IF EXISTS users;
            ";
            $db->exec($delete);

            $query = "
            CREATE TABLE IF NOT EXISTS users(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT,
                password TEXT,
                rol_id INTEGER
            )
        ";

            $db->exec($query);

            $query = "
                CREATE TABLE IF NOT EXISTS rol(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT
                )
            ";
                
             $db->exec($query);

             $query = "
                 INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
             ";
                
            $db->exec($query);
        }

        public static function delete($db, $id) : int{
            $query = "
                DELETE FROM flota WHERE id = $id;
            ";

            $filas = $db->exec($query);
            return $filas;
        }

        public static function insert($db,$marca, $matricula, $capacidad, $tipo, $precio, $reservado) : void{
            $query = "
                INSERT INTO flota (marca, modelo, matricula, capacidad, tipo, precio, reservado) VALUES 
                ('$marca', '$matricula', $capacidad, '$tipo', $precio, $reservado);
            ";

            $db->exec($query);
        }

        public static function select($db) : PDOStatement{
            $query = "
                SELECT * FROM flota;
            ";

            $result = $db->query($query);
            return $result;
        }
     }
?>
