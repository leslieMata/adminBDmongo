<?php 
  require_once "clases/Crud.php";
  $crud = new Crud();
  $id = $_POST['_id'];
  $datos = $crud->obtenerDocumento($id);
  $idMongo = new \MongoDB\BSON\ObjectId($datos->_id);
?>
<?php require_once 'header.php'; ?>
  <div class="container"> 
    <div class="jumbotron">
      <h1 class="display-4">Eliminar un registro <i class="fas fa-user-slash"></i> </h1>
        <p class="lead">
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Advertencia!</h4>
            <p>Estas seguro de eliminar este registro!!!.</p>
            <p>
              <div class="table-responsive">
                <table class="table table-hover table-sm table-bordered">
                  <thead>
                    <th class="text-center">Nombre(s)</th>
                    <th class="text-center">Apellido paterno</th>
                    <th class="text-center">Apellido materno</th>
                    <th class="text-center">fecha de naciemiento</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $datos->nombre?></td>
                      <td><?php echo $datos->paterno ?></td>
                      <td><?php echo $datos->materno?></td>
                      <td><?php echo $datos->fecha_nacimiento?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </p>
            <hr>
            <p class="mb-0">
              <form action="procesos/eliminar.php" method="POST">
                <input type="text" hidden name="idEliminar" value="<?php echo $idMongo;?>">
                <button class="btn btn-danger">Eliminar <i class="far fa-trash-alt"></i></button>
                <a href="index.php" class="btn btn-info"> Regresar  <i class="fas fa-redo"></i> </a>
              </form>
             
             
            </p>
          </div>
        </p>
      </div>
    </div>

<?php require_once 'scripts.php'; ?>