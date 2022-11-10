<?php
class Conexion{
    public static function Conectar(){
        define('servidor','localhost');
        define('nombre_bd','veterinaria');
        define('usuario', 'root');
        define('password','');

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
        //  utf8mb4
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd,usuario,password,$opciones);
            return $conexion;
        }catch(Exception $e){
            die("El error de la conexion es: ".$e->getMessage());

        }
    }
}

//     private $dbhost   = 'localhost';
//     private $dbname   = 'veterinaria';
//     private $username = 'root';
//     private $password = '';
//     private $charset  = 'utf8mb4';

//     function connect(){
//         try{
//             $conexion = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

//             $options = [
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_EMULATE_PREPARES => false
//             ];

//             $pdo = new PDO($conexion, $this->username, $this->password, $options);
//             return $pdo;
//         }catch(PDOException $e){
//             print_r('Error de conexión: ' . $e->getMessage());
//         }
//     }
// }
?>