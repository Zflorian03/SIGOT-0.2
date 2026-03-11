<?php

require_once("../config/database.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "UPDATE usuarios SET password='$password' WHERE email='$email'";

if($conn->query($sql)){

header("Location: login.php");

}else{

echo "Error al actualizar contraseña";

}

?>