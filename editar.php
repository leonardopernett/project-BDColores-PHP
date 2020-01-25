<?php





include_once "conexion.php";

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];


echo $id;
echo $color;
echo $descripcion;


$sql = "UPDATE colores SET color=?, descripcion=? WHERE id=?";

$send = $pdo->prepare($sql);

$send->execute([$color,$descripcion,$id]);

header('location:index.php');

