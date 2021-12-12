<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/adminBDmongo/vendor/autoload.php";
    class Conexion {
        public static function conectar() {
            $servidor = "127.0.0.1";
            $puerto = "27017";
            $usuario = "leslie";
            $password= "1234";
            $BD= "crudmongo";
            #crea algo como mongodb: 
            $cadenaConexion ="mongodb://" . $usuario . ":" . $password . "@" . $servidor . ":" . $puerto . "/" . $BD;
            try {
                $cliente = new MongoDB\Client($cadenaConexion);
                return $cliente->selectDatabase($BD);
            } catch (\Throwable $th) {
                return $th;
            }               
        }
    }
    // $objeto = new Conexion();
    // print_r($objeto->conectar());
?>