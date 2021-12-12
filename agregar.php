<?php require_once 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container" style="background-color: orange;"> 
    <p>
      <a href="index.php" class="btn btn-info"> Regresar  <i class="fas fa-redo"></i> </a>
    </p>
    <h1 class="display-4">Agregar registro nuevo <i class="fas fa-pen-nib"></i> </h1>
    <p class="lead">
        <form action="procesos/agregar.php" method="POST">
            <label for="nombre">Nombre(s)</label>
            <input type="text" name="nombre" class="form-control" required>
            <label for="paterno">Apellido paterno</label>
            <input type="text" name="paterno" class="form-control" required>
            <label for="materno">Apellido materno</label>
            <input type="text" name="materno" class="form-control" required>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
            <br>
            <button class="btn btn-primary"> Agregar  <i class="fas fa-pen-nib"></i> </button>
        </form>
    </p>
  </div>
</div>

<?php require_once 'scripts.php'; ?>