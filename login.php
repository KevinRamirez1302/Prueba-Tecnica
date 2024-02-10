<?php session_start();


if (isset($_SESSION['usuario'])){
    header("Location:index.php");
    exit();
};

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" ){
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');
    }

    catch(PDOException $e){
        echo $e -> getMessage();
    }

    $statement= $conexion->prepare('SELECT * FROM usuario WHERE usuario = :user AND clave = :passw');

    $statement->bindParam(':user', $usuario);
    $statement->bindParam(':passw', $pass);

    $statement->execute();

    $resultado = $statement-> fetch();

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        $errores .= 'Datos incorrectos';
    }
    

}

require './src/login.view.php';

?>