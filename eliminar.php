<?php

require_once "conexion.php";

$id = $_GET['id'];


$sql = "DELETE FROM colores WHERE id=?";

$sentences = $pdo->prepare($sql);
$sentences->execute([$id]);

header('location:index.php');
