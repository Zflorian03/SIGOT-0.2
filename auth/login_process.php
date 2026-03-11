<?php

require_once("../config/database.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if(!$result){
    die("Error SQL: ".$conn->error);
}

if($result->num_rows > 0){

$user = $result->fetch_assoc();

$_SESSION['usuario'] = $user['nombre'];
$_SESSION['rol'] = $user['id_rol'];

if($user['id_rol'] == 1){
header("Location: ../dashboard/admin.php");
}else{
header("Location: ../dashboard/cliente.php");
}

}else{

echo "Usuario o contraseña incorrectos";

}
?>