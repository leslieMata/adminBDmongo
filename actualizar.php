<?php
  require_once "clases/Crud.php";
  $crud = new Crud();
  $id= $_POST['idActualizar'];
  $datos = $crud->obtenerDocumento($id);
  $idMongo = new MongoDB\BSON\ObjectId($datos->_id);
  
?>

<?php require_once 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container" style="background-color: violet;"> 
    <p>
      <a href="index.php" class="btn btn-info"> Regresar  <i class="fas fa-redo"></i> </a>
    </p>
    <h1 class="display-4">Actualizar un registro  <i class="fas fa-user-edit"></i> </h1>
    <form action="procesos/actualizar.php" method="POST">
      <input type="text" name="idActualizar" value="<?php echo $idMongo;?>" hidden>
        <p class="lead">
          <label for="nombre">Nombre(s)</label>
          <input type="text" name="nombre" value="<?php echo $datos->nombre;?>" class="form-control" required>
          <label for="paterno">Apellido paterno</label>
          <input type="text" name="paterno" value="<?php echo $datos->paterno;?>" class="form-control" required>
          <label for="materno">Apellido materno</label>
          <input type="text" name="materno" value="<?php echo $datos->materno;?>" class="form-control" required>
          <label for="fecha_nacimiento">Fecha de nacimiento</label>
          <input type="date" name="fecha_nacimiento" value="<?php echo $datos->fecha_nacimiento;?>" class="form-control" required>
          <br>
          <button class="btn btn-warning"> Actualizar  <i class="fas fa-user-edit"></i> </button>
        </form>
      </p>
  </div>
</div>

<?php require_once 'scripts.php'; ?>