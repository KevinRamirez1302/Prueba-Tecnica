<?php session_start();

    $usuario = $_SESSION['usuario'];
    require('./funciones/obtenerid.php');

    $resultado = extraerID($usuario);
    $id= $resultado['idusuario'];

    try{

    $conexion = conectar();

     }
    catch(PDOException $e){
    echo "Error: " . $e->getMessage();

    };

    //buscar datos de las ventas

    $statement = $conexion->prepare('SELECT cliente.nombre,usuario.usuario,ventas.total,detalle_venta.cantidad, cliente.nombre,producto.id,producto.descripcion, producto.id
    FROM detalle_venta 
    INNER JOIN usuario ON detalle_venta.id_usuario = :user
    INNER JOIN cliente ON detalle_venta.id_usuario = :user
    INNER JOIN producto ON detalle_venta.id_usuario = :user
    INNER JOIN ventas ON detalle_venta.id_usuario = :user LIMIT 8;');
    $statement->bindParam(':user', $id);

    $statement->execute();

    $resultado = $statement->fetchAll();
    

   


require('./src/navbar.php');
require('./src/ventas.view.php');

?>