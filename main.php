<?php session_start();

$userid = $_SESSION['usuario'];


try {
    $conexion =new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');

}catch(PDOException $e) {
    $e-> getMessage();
}

// extraccion ID


$statement= $conexion->prepare('SELECT idusuario FROM usuario WHERE usuario = :user');

$statement->bindParam(':user', $userid);

$statement->execute();
$resultado = $statement->fetch();
$id = $resultado['idusuario'];


// Estadisticas de usuario

echo $id;

$datasell =  $conexion->prepare('SELECT * FROM detalle_venta WHERE id_usuario = :iduser');
$datasell->bindParam(':iduser', $id);
$datasell->execute();
$sell = $datasell->fetchAll();

foreach($sell as $num){
    print_r($num['precio']);
};







if (isset($_SESSION['usuario'])){
    require ('./src/navbar.php');
    require('./src/main.view.php');
    
} else {
    header('Location: login.php');
}



?>