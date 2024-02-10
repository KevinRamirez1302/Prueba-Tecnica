<?php 
    function () {
    try{

    $conexion =new PDO('mysql:host=localhost;dbname=gestion_ventas','root','Japon1302$');
    echo "Conexion exitosa";

     }
    catch(PDOException $e){
    echo "Error: " . $e->getMessage();

    }

    }
    

?>