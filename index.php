<?php

//leer
include_once('conexion.php');


$sql = 'SELECT * FROM  colores';
$send = $pdo->prepare($sql);
$send->execute();
$resultado = $send->fetchAll();

//var_dump($resultado);


//agregar

if($_POST){
  
  $color       =  $_POST['color'];
  $descripcion =  $_POST['descripcion'];

    $sql = "INSERT INTO colores (color, descripcion)
    VALUES (?,?)";
     
     $send = $pdo->prepare($sql);
     $send->execute([$color,$descripcion]);

     header('location:index.php');


}
//EDITAR
if($_GET){
   
  $id = $_GET['id'];
  $sql = 'SELECT * FROM  colores wHERE  id=? ' ;
  $sends = $pdo->prepare($sql);
  $sends->execute([$id]);
  $resultados = $sends->fetch();


 
} 



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>PHP y MSQL</title>
  </head>
  <body>
    <div class="container mt-4">
    <div class="row">
       <div class="col-md-6 mt-2">
       <?php foreach($resultado as $datos): ?>
            <div class="alert alert-<?php  echo $datos['color']; ?>">
            
                <?php  echo $datos['color']; ?>
                -
                <?php  echo $datos['descripcion']; ?>
                <a href="index.php?id=<?php  echo $datos['id']; ?>" class="float-right ml-3"><i class="fa fa-pencil" ></i>
                </a>
                
                <a href="eliminar.php?id=<?php  echo $datos['id']; ?>" class="float-right"><i class="fa fa-trash" ></i></a>
               

            </div>
       <?php  endforeach ?>
       </div>


       <div class="col-md-6">
     
       <?php  if(!$_GET): ?>
       <h3 class="text-center">Agregar</h3>
         <form action="" method="post">
            <input type="text" class="form-control" name="color" id="color" placeholder="color:">
            <input type="text" class="form-control mt-2" name="descripcion" id="descripcion" placeholder="descripcion: ">
             <button class="btn btn-primary mt-3">Agregar</button>
         </form>
        <?php  endif ?>

        <?php  if($_GET): ?>
       <h3 class="text-center">Editar</h3>
         <form action="editar.php" method="get">
            <input type="text" class="form-control" name="color" id="color"
             value="<?php  echo $resultados['color']; ?>"  >
            <input type="text" class="form-control mt-2" name="descripcion" id="descripcion" placeholder="descripcion: " 
            value="<?php  echo $resultados['descripcion'];?>" >
            <input type="hidden" name="id" value="<?php  echo $resultados['id'];?>">
             <button class="btn btn-primary mt-3">editar</button>
         </form>
        <?php  endif ?>
       </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>