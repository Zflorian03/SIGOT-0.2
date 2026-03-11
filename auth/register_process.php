<?php

require_once("../config/database.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$id_rol = 2; // cliente

$sql = "INSERT INTO usuarios(nombre,email,password,id_rol)
VALUES('$nombre','$email','$password','$id_rol')";

if($conn->query($sql)){

header("Location: login.php");

}else{

echo "Error al registrar usuario";

}

?>