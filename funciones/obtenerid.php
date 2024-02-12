<?php 

require('./funciones/connect.php');

 function extraerID($id){

    $conexion = conectar();

    $statement= $conexion->prepare('SELECT * FROM usuario WHERE usuario = :user');

    $statement->bindParam(':user', $id);

    $statement->execute();
    
    $resultado = $statement->fetch();

    return $resultado;
 }

?>