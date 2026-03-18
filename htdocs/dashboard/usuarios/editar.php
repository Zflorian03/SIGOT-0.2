<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once __DIR__ . "/../../config/database.php";

session_start();

if(!isset($_SESSION['logged_in'])){
header("Location: ../../login.php");
exit();
}

/* VALIDAR ID */
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
die("ID inválido");
}

$id = intval($_GET['id']);

/* OBTENER USUARIO */
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 0){
die("Usuario no encontrado");
}

$user = $result->fetch_assoc();

/* ACTUALIZAR */
if($_SERVER['REQUEST_METHOD'] == "POST"){

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$rol = $_POST['rol'];

/* VALIDAR CAMPOS */
if(empty($nombre) || empty($email) || empty($rol)){
die("Campos obligatorios vacíos");
}

/* ACTUALIZAR CON PASSWORD */
if(!empty($_POST['password'])){

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE usuarios SET nombre=?, email=?, password=?, rol=? WHERE id=?");
$stmt->bind_param("ssssi",$nombre,$email,$password,$rol,$id);

}else{

$stmt = $conn->prepare("UPDATE usuarios SET nombre=?, email=?, rol=? WHERE id=?");
$stmt->bind_param("sssi",$nombre,$email,$rol,$id);

}

if(!$stmt->execute()){
die("Error al actualizar: ".$conn->error);
}

header("Location: index.php");
exit();

}
?>