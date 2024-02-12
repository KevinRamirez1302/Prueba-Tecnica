<?php session_start();
    require('./funciones/connect.php');
    
    try{

    $conexion = conectar();

     }
    catch(PDOException $e){
    echo "Error: " . $e->getMessage();

    };

    $statement = $conexion->prepare('SELECT * FROM producto');

    $statement->execute();

    $resultado = $statement->fetchAll();

   


require('./src/navbar.php');
require('./src/product.view.php');

?>