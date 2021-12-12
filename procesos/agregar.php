<?php 
    require_once "../clases/Crud.php";
    $crud = new Crud();
    $datos = array(
        "nombre" => $_POST['nombre'],
        "paterno" => $_POST['paterno'],
        "materno" => $_POST['materno'],
        "fecha_nacimiento" => $_POST['fecha_nacimiento']
    );
    $respuesta = $crud->insertarDatos($datos);
    if ($respuesta->getInsertedId() >0) {
        $_SESSION['mensaje_crud'] = "insert";
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }
    
?>