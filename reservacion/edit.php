<?php
include('../config/config.php');
include('reservacion.php');

$p = new reservacion();
$dp =  mysqli_fetch_object($p->getOne($_GET['id' ]));
$date = new DateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){

  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar  </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<?php
    include ('../menu.php') 
    ?>
    <div class="container" >
    <?php 
    if (isset($error)){
     echo$error;
    }
    ?>
          <h2 class="text-center mb=2" > Modoficar reservacion</h2>
      
      

<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombres" id="nombres"   class="form-control" value="<?=$dp->nombres ?>" >
    <input type="hidden" name="id" id="id"   class="form-control" value="<?=$dp->id ?>" >
    </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" value="<?=$dp->apellidos ?>"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Celular</label>
    <input type="text" name="cel" id="cel" value="<?=$dp->cel ?>" class="form-control"  >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Correo</label>
    <input type="email" name="email" id="email" value="<?=$dp->email ?>"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Tipo de evento</label>
    <input type="text" name="evento" id="evento" value="<?=$dp->evento ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Numero personas adultos</label>
    <input type="text" name="padultos" id="padultos" value="<?=$dp->padultos ?>" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Numero personas niños</label>
    <input type="text" name="pninos" id="pninos" class="form-control" value="<?=$dp->pninos ?>"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha</label>
    <input type="datetime-local" name="fecha" id="fecha" value="<?= $date->format('Y-m-d\TH:i') ?>"class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Comentarios</label>
    <input type="text" name="comentarios" id="comentarios" class="form-control" value="<?=$dp->comentarios ?>"  placeholder="Apartment, studio, or floor">
  </div>
 
  <div class="col-12">
    <button  class="btn btn-primary">Modificar</button>
  </div>
</form>

    </div>
</body>
</html>