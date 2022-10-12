<?php 
include_once('../config/config.php');
include('reservacion.php');

$p = new reservacion();
$data = $p->getALL();

if (isset($_GET['id'])&& !empty($_GET['id'])) {
  $remove= $p->delete($_GET['id']);
  if ($remove){
    header('location: index.php' );
  }else{
    $mensaje= '<div class="alert alert-danger" role="alert"> Error al eliminar </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocumentLista reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    

</head>
<body>
<?php
    include('../menu.php');
    ?>
    <div class="containe" >
        <h2 class="text-center mb=2" > Reservas</h2>
        <div clas="row">
            <?php 
                
              while($usuarios= mysqli_fetch_object($data)){
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>Nombre: $usuarios->nombres  </h5>";
                echo "<p><b>Correo:</b> $usuarios->cel 
                <br>
                <b> Celular: </b>  $usuarios->email
                </p>";
                

                echo "<div class='center'> <a class='btn btn-success' href='edit.php?id=$usuarios->id' >Modificar</a> - <a class='btn btn-danger' href='index.php?id=$usuarios->id' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";
               }
            ?>
        </div>

    </div>
</body>
</html>