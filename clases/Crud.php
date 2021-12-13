<?php
    require_once "Conexion.php";
    class Crud{
        public function insertarDatos($datos){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->insertOne([
                    "nombre" => $datos['nombre'],
                    "paterno" => $datos['paterno'],
                    "materno" => $datos['materno'],
                    "fecha_nacimiento" => $datos['fecha_nacimiento']
                ]);
                return $resultado;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function obtenerDocumento($id){
            $conexion = Conexion::conectar();
            $coleccion = $conexion->personas;
            try {
                $datos = $coleccion->findOne(array('_id' => new MongoDB\BSON\ObjectId($id)));
                return $datos;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function actualizar($datos){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->updateOne(
                    ["_id" => new MongoDB\BSON\ObjectId($datos['_id'])],
                    [
                        '$set' => [
                            "nombre" => $datos['nombre'],
                            "paterno" => $datos['paterno'],
                            "materno" => $datos['materno'],
                            "fecha_nacimiento" => $datos['fecha_nacimiento']
                        ],
                    ]);
                    return $resultado;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function eliminar($id){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $respuesta = $coleccion->deleteOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
                return $respuesta;
            } catch (\Throwable $th){
                return $th;
            }
        }
        public function mostrar(){
            try {
                $conexion = Conexion::conectar();
                $coleccion =$conexion->personas;
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return  $th;
            }
        }
        public function mensajeCrud($mensaje){
            $msg = '';
            if ($mensaje == "insert") {
                $msg = 'swal("Excelente!", "Agregado con exito!", "success");';
            } else if ($mensaje == "update") {
                $msg = 'swal( "Excelente", "actualizado con exito!", "info");';
            } else if ($mensaje == "delete") {
                $msg = 'swal("Excelente!", "Eliminado con exito!", "warning");';
            }
            return $msg;
        }
    }
?>
