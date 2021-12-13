<?php 
    session_start();
    require_once "../clases/Crud.php";
    $crud = new Crud();
    $datos = array(
        "_id" => $_POST['idActualizar'],
        "nombre" => $_POST['nombre'],
        "paterno" => $_POST['paterno'],
        "materno" => $_POST['materno'],
        "fecha_nacimiento" => $_POST['fecha_nacimiento']  
    );
    $respuesta = $crud->actualizar($datos);
    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = "update";
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }
?>