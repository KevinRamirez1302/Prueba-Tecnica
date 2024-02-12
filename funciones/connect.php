<?php 
    function conectar() {
        
    try{

    $conexion =new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');

     }
    catch(PDOException $e){
    echo "Error: " . $e->getMessage();

    }

    return $conexion;

    }
    

?>