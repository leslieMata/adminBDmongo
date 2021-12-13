<?php
  session_start();
  require_once "clases/Crud.php";
  $obj = new Crud();
  $datos = $obj->mostrar();
  $mensaje = @$obj->mensajeCrud($_SESSION['mensaje_crud']);
  unset($_SESSION['mensaje_crud']);
  //  echo "<pre>";
  //    print_r($datos);
  // echo "</pre>";
?>
<?php require_once 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container" style="background-color: pink;"> 
    <h1 class="display-4">CRUD CON PHP Y MongoDB  <i class="far fa-heart"></i> </h1>
    <p class="lead">
      <a href="agregar.php" class="btn btn-primary"> Agregar persona <i class="far fa-address-book"></i></a> 
      <hr>
      <div class="table-responsive">
        <table class="table table-hover table-sm table-bordered" id="datatableMongo">
          <thead>
            <th class="text-center">Nombre(s)</th>
            <th class="text-center">Apellido paterno</th>
            <th class="text-center">Apellido materno</th>
            <th class="text-center">Fecha de nacimiento</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
          </thead>
          <tbody>
            <?php foreach ($datos as $key): 
              $idMongo = new MongoDB\BSON\ObjectId($key->_id);  
            ?>
            <tr>
              <td><?php echo $key->nombre; ?></td>
              <td><?php echo $key->paterno; ?></td>
              <td><?php echo $key->materno; ?></td>
              <td><?php echo $key->fecha_nacimiento; ?></td>
              <td>
                <form action="actualizar.php" method="POST">
                  <input type="text" name="idActualizar" hidden value="<?php echo $idMongo?>">
                  <button class="btn btn-warning">Editar <i class="fas fa-user-edit"></i> </button>
                </form>
              </td>
              <td>
                <form action="eliminar.php" method="POST">
                  <input type="text" name="_id" hidden value="<?php echo $idMongo?>">
                  <button class="btn btn-danger">Eliminar <i class="fas fa-trash"></i> </button></td> 
                </form>
            </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table> 
      </div>
    </p>
  </div>
</div>

<?php require_once 'scripts.php'; ?>
<script>
  let mensaje = <?php echo $mensaje;?>;
  console.log(mensaje);
</script>