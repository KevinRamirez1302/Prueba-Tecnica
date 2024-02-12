<?php session_start();

$errors = '';
$success = '';
$user = $_SESSION['usuario'];
require('./funciones/obtenerid.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = strtolower($_POST['nombre']);
    $price = $_POST['precio'];
    $img = $_POST['img'];
    $category = $_POST['categoria'];
   
    if (empty($name) || empty($price) || empty($img) || empty($category)) {
        $errors .= 'Por favor rellena todos los datos';
    } else {
        
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors .= 'El nombre debe contener solo letras y espacios';
        }
        if (!is_numeric($price) || $price <= 0) {
            $errors .= 'El precio debe ser un número positivo';
        }
       
    }
    
    
      
    $conexion = conectar();
          
    
    if(empty($errors)){
        //RECUPERAR ID DE USUARIO    

    
    $resultado = extraerID($user);


    // Agregar producto
    

     $statement= $conexion->prepare('INSERT INTO producto (imagen,descripcion,precio,categoria,existencia,usuario_id) VALUES
    ( :img, :nom, :pre , :cate , 3, :usuarioid);');

     $statement->bindParam(':nom', $name);
     $statement->bindParam(':pre', $price);
     $statement->bindParam(':img', $img);
     $statement->bindParam(':cate', $category);
     $statement->bindParam(':usuarioid', $resultado['idusuario']);
     $statement->execute();
     $success = 'Producto guardado';
    } else {
        $errors = 'POR FAVOR INGRESA DATOS VALIDOS';
    }
   

    
        
     
}


require ('./src/navbar.php');
require("./src/productForm.view.php")


?>