<?php session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['usuario'])){
    header("Location: index.php");
};

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == " POST" ){
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');
    }

    catch(PDOException $e){
        echo $e -> getMessage();
    }

    $statement= $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :user AND clave = :pass');

    $statement-> execute(array(
        ':usuario' => $usuario,
        ':pass' => $pass
    ));

    $resultado = $statement-> fetch();

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        $errores .= '<li>Datos incorrectos<li/>';
    }
    

}

require './navbar.php';
require './src/login.view.php';

?>