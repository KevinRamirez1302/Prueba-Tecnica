<?php session_start();
$errores = '';
$success = '';
$user = $_SESSION['usuario'];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = strtolower($_POST['nombre']);
    $telefono = filter_var($_POST['telefono'], FILTER_VALIDATE_INT);
    $direc = $_POST['direccion'];
    $doc = $_POST['documento'];

    
     if (empty($name)) {
        $errores .= 'El nombre no puede estar vacío.<br>';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errores .= 'El nombre debe contener solo letras y espacios.<br>';
    }
    
    
    if (empty($telefono)) {
        $errores .= 'El teléfono no puede estar vacío.<br>';
    } elseif (!filter_var($telefono, FILTER_VALIDATE_INT) || $telefono <= 0) {
        $errores .= 'El teléfono debe ser un número positivo.<br>';
    }

   
    if (empty($direc)) {
        $errores .= 'La dirección no puede estar vacía.<br>';
    }

    
    if (empty($doc)) {
        $errores .= 'El documento no puede estar vacío.<br>';
    } elseif (!ctype_digit($doc)) {
        $errores .= 'El documento debe ser numérico.<br>';
    }
   

      try{
         $conexion = new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');
         }
      catch(PDOException $e){
         $e->getMessage();
        }



    if(empty($errores)){
        $statementid = $conexion->prepare('SELECT idusuario FROM usuario WHERE usuario = :username ;');  
    $statementid->bindParam(':username', $user);
    $statementid->execute();
    $resultado = $statementid->fetch();         
    
    

    $statement= $conexion->prepare('INSERT INTO cliente (nombre,telefono,direccion,usuario_id,documento) VALUES
    ( :nom, :tel, :dir , :iduser, :docum);');

    $statement->bindParam(':nom', $name);
    $statement->bindParam(':tel', $telefono);
    $statement->bindParam(':dir', $direc);
    $statement->bindParam(':iduser',$resultado['idusuario']);
    $statement->bindParam(':docum', $doc);
    $success = 'Cliente guardado correctamente';
        
    $statement->execute();
    } else {
        $errores = 'Datos invalidos';
       
    }

    
    
}


require('./src/navbar.php');
require('./src/clienteForm.php')

?>