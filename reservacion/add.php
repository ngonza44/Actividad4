<?php
include_once('../config/config.php');
include ('reservacion.php');

if (isset($_POST) && !empty($_POST)){
$p = new reservacion();

$save = $p->save($_POST);

if($save){
    $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div>' ;
  }else{
    $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
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
   include('../menu.php');
   ?>
    <div class="container" >
        <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
         
        ?> 
 <h2 class="text-center mb=2" > Registre su reserva</h2>
 <form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombres" id="nombres"   class="form-control" >
    </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos"   class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Celular</label>
    <input type="text" name="cel" id="cel" class="form-control"  >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Correo</label>
    <input type="email" name="email" id="email"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Tipo de evento</label>
    <input type="text" name="evento" id="evento" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Numero personas adultos</label>
    <input type="text" name="padultos" id="padultos" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Numero personas niños</label>
    <input type="text" name="pninos" id="pninos" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha</label>
    <input type="datetime-local" name="fecha" id="fecha" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Comentarios</label>
    <input type="text" name="comentarios" id="comentarios" class="form-control"  placeholder="Apartment, studio, or floor">
  </div>
 
  <div class="col-12">
    <button  class="btn btn-primary">Registrar</button>
  </div>
</form>

    </div>
</body>
</html>