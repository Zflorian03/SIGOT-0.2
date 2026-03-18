<?php
require_once "config/database.php";

$msg="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO usuarios(nombre,email,password,id_rol)
VALUES(?,?,?,4)";

$stmt=$conn->prepare($sql);
$stmt->bind_param("sss",$nombre,$email,$password);
$stmt->execute();

$msg="Cuenta creada correctamente";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Crear Cuenta</title>

<style>

body{

margin:0;
font-family:Poppins;

background:url("https://images.unsplash.com/photo-1544620347-c4fd4a3d5957")
center/cover no-repeat;

display:flex;
justify-content:center;
align-items:center;
height:100vh;

}

.card{

background:rgba(255,255,255,0.08);
backdrop-filter:blur(20px);

padding:40px;
border-radius:20px;
width:350px;
color:white;

}

input{

width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:10px;

}

button{

width:100%;
padding:12px;
background:#2c6cff;
border:none;
border-radius:10px;
color:white;

}

</style>

</head>

<body>

<div class="card">

<h2>Crear Cuenta</h2>

<?php echo $msg ?>

<form method="POST">

<input name="nombre" placeholder="Nombre">

<input name="email" placeholder="Correo">

<input type="password" name="password" placeholder="Contraseña">

<button>Registrarse</button>

</form>

</div>

</body>
</html>