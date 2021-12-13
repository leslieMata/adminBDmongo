<?php 
    session_start();
    require_once "../clases/Crud.php";
    $crud = new Crud();
    $id = $_POST['idEliminar'];
    $respuesta = $crud->eliminar($id);
    if ($respuesta->getDeletedCount() > 0) {
        $_SESSION['mensaje_crud'] = "delete";
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }
?>