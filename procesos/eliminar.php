<?php 
    require_once "../clases/Crud.php";
    $crud = new Crud();
    $id = $_POST['idEliminar'];
    $respuesta = $crud->eliminar($id);
    if ($respuesta->getDeletedCount() > 0) {
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }
?>