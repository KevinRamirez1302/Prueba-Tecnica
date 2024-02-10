<?php
    try{

    $conexion =new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');

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