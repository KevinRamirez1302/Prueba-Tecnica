<?php session_start();

if(isset($_SESSION['usuario'])) {
    header("Location: main.php");
} else {
    header("Location: login.php");
}

?>