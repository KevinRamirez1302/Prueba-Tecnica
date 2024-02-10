<?php session_start();

$errores = '';
$id = $_GET['id'];


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = strtolower($_POST['nombre']);
    $price = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
    $img = $_POST['img'];
    $category = $_POST['categoria'];
   

    if( empty($name) or empty($price) or empty($img) or empty($category)){
        $errores .= '<li>Por favor rellena todos los datos</li>';
    } else {
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=gestion_venta','root','Japon1302$');

        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    

    $statement= $conexion->prepare('INSERT INTO producto (imagen,descripcion,precio,categoria,existencia,usuario_id) VALUES
    ( :img, :nom, :pre , :cate , 3,:idu);');

    $statement->bindParam(':nom', $name);
    $statement->bindParam(':pre', $price);
    $statement->bindParam(':img', $img);
    $statement->bindParam(':cate', $category);
    $statement->bindParam(':idu', $id);

    
    $statement->execute();
    

}



require ('./src/navbar.php');
require("./src/productForm.view.php")


?>