<?php


$link     = 'mysql:host=localhost;dbname=BDColores';
$usuario  = 'root';
$password ='Admin09';


try{

    $pdo = new PDO($link,$usuario,$password);
   
}catch(PDOException $e){

   print "error". $e->getMessage(). " <br/>";
   die();
 
}


?>