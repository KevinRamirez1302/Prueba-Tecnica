<?php session_start();

$userid = $_SESSION['usuario'];
require('./funciones/obtenerid.php');

try {
    $conexion = conectar();

}catch(PDOException $e) {
    $e-> getMessage();
}

// extraccion ID


$resultado = extraerID($userid);
$id = $resultado['idusuario']; 


// extraccion clientes


$client= $conexion->prepare('SELECT * FROM cliente WHERE usuario_id = :usercli LIMIT 4');

$client->bindParam(':usercli', $id);
$client->execute();
$clienteresult = $client->fetchAll();



//id del producto mas vendido MAS VENDIDO

$bestseller = $conexion->prepare('SELECT id_producto, COUNT(*) as total_sales
FROM detalle_venta WHERE id_usuario = :iduser
GROUP BY id_producto
ORDER BY total_sales DESC
LIMIT 1;');

$bestseller->bindParam(':iduser', $id);
$bestseller->execute();
$bestselleresult = $bestseller->fetch();


// Buscar nombre del producto mas vendido

$bestproduct =  $conexion->prepare('SELECT * FROM producto WHERE id = :idproduct LIMIT 1;');
$bestproduct->bindParam(':idproduct', $bestselleresult['total_sales']);
$bestproduct->execute();
$bestproductresult = $bestproduct->fetch();




// Estadisticas de usuario



$datasell =  $conexion->prepare('SELECT * FROM ventas WHERE id_usuario = :iduser');
$datasell->bindParam(':iduser', $id);
$datasell->execute();
$sell = $datasell->fetchAll();


$total = 0;
foreach($sell as $num){
  $total += $num['total'];
};

$clientes = 0;
foreach($sell as $client){
    $client  = $client['id_cliente'];
     $clientes++;

  };


 

if (isset($_SESSION['usuario'])){
    require ('./src/navbar.php');
    require('./src/main.view.php');
    
} else {
    header('Location: login.php');
}



?>