<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once __DIR__ . "/../../config/database.php";

session_start();

if(!isset($_SESSION['logged_in'])){
header("Location: ../../login.php");
exit();
}

/* MAPEO DE ROLES */
function obtenerRolID($rol){
    switch($rol){
        case "Administrador": return 1;
        case "Supervisor": return 2;
        case "Operador": return 3;
        case "Cliente": return 4;
        default: return 4;
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password_input = $_POST['password'];
$rol_texto = $_POST['rol'];

if(empty($nombre) || empty($email) || empty($password_input) || empty($rol_texto)){
die("Campos vacíos");
}

$id_rol = obtenerRolID($rol_texto);

$password = password_hash($password_input, PASSWORD_DEFAULT);

/* INSERT CORRECTO SEGÚN TU BD */
$stmt = $conn->prepare("INSERT INTO usuarios(nombre,email,password,id_rol) VALUES(?,?,?,?)");

if(!$stmt){
die("Error prepare: ".$conn->error);
}

$stmt->bind_param("sssi",$nombre,$email,$password,$id_rol);

if(!$stmt->execute()){
die("Error al guardar: ".$stmt->error);
}

header("Location: index.php");
exit();

}
?>