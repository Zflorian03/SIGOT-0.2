<?php require_once("../config/database.php"); ?>

<h2>Recuperar contraseña</h2>

<form method="POST">

<input name="email" placeholder="Correo registrado">

<button>Buscar</button>

</form>

<?php

if($_POST){

$email=$_POST['email'];

$result=$conn->query("SELECT * FROM usuarios WHERE email='$email'");

if($result->num_rows>0){

echo "Contacta al administrador para resetear tu contraseña.";

}else{

echo "Correo no encontrado.";

}

}

?>