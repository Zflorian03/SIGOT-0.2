<?php
session_start();
require_once "config/database.php";

$error="";

/* ================================
   CREAR ADMINISTRADOR POR DEFECTO
================================ */

// verificar rol administrador
$rolCheck=$conn->query("SELECT * FROM roles WHERE nombre='Administrador'");

if($rolCheck->num_rows==0){

$conn->query("INSERT INTO roles(nombre) VALUES('Administrador')");
$conn->query("INSERT INTO roles(nombre) VALUES('Supervisor')");
$conn->query("INSERT INTO roles(nombre) VALUES('Operador')");
$conn->query("INSERT INTO roles(nombre) VALUES('Cliente')");

}

// obtener id del rol administrador
$rolAdmin=$conn->query("SELECT id_rol FROM roles WHERE nombre='Administrador'");
$rolAdminID=$rolAdmin->fetch_assoc()['id_rol'];

// verificar si existe el admin
$adminCheck=$conn->prepare("SELECT id_usuario FROM usuarios WHERE email=?");
$emailAdmin="adminofc@sigot.com";

$adminCheck->bind_param("s",$emailAdmin);
$adminCheck->execute();
$resultAdmin=$adminCheck->get_result();

if($resultAdmin->num_rows==0){

$passwordAdmin=password_hash("admin123",PASSWORD_DEFAULT);

$stmt=$conn->prepare("INSERT INTO usuarios(nombre,email,password,id_rol) VALUES(?,?,?,?)");

$nombreAdmin="Administrador";

$stmt->bind_param("sssi",$nombreAdmin,$emailAdmin,$passwordAdmin,$rolAdminID);

$stmt->execute();

}

/* ================================
   PROCESO DE LOGIN
================================ */

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT usuarios.*,roles.nombre as rol
FROM usuarios
INNER JOIN roles ON usuarios.id_rol=roles.id_rol
WHERE email=?";

$stmt=$conn->prepare($sql);

$stmt->bind_param("s",$email);
$stmt->execute();

$result=$stmt->get_result();

if($result->num_rows>0){

$user=$result->fetch_assoc();

if(password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id_usuario'];
$_SESSION['nombre']=$user['nombre'];
$_SESSION['rol']=$user['rol'];
$_SESSION['logged_in']=true;

switch($user['rol']){

case "Administrador":
header("Location: dashboard/admin.php");
break;

case "Supervisor":
header("Location: dashboard/supervisor.php");
break;

case "Operador":
header("Location: dashboard/operador.php");
break;

case "Cliente":
header("Location: dashboard/cliente.php");
break;

}

exit();

}else{

$error="Contraseña incorrecta";

}

}else{

$error="Usuario no encontrado";

}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - SIGOT</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

body{

margin:0;
font-family:Poppins;

background:url("https://images.unsplash.com/photo-1593950315186-76a92975b60c")
center/cover no-repeat;

height:100vh;
display:flex;
justify-content:center;
align-items:center;

}

.overlay{

position:absolute;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
backdrop-filter:blur(5px);

}

.card{

position:relative;
background:rgba(255,255,255,0.08);
backdrop-filter:blur(20px);
padding:40px;
border-radius:20px;
width:350px;
color:white;

}

.logo{

text-align:center;
font-size:26px;
margin-bottom:20px;

}

.logo i{

font-size:35px;
color:#4ea3ff;

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
font-size:16px;
cursor:pointer;

}

.links{

margin-top:10px;
text-align:center;

}

.links a{

color:#9dc6ff;
text-decoration:none;

}

.error{

background:#ff4e4e;
padding:10px;
border-radius:10px;
margin-bottom:10px;

}

</style>

</head>

<body>

<div class="overlay"></div>

<div class="card">

<div class="logo">

<i class="fa-solid fa-bus"></i><br>

SIGOT

</div>

<?php if($error!=""){ ?>

<div class="error"><?php echo $error ?></div>

<?php } ?>

<form method="POST">

<input type="email" name="email" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button>Iniciar Sesión</button>

</form>

<div class="links">

<a href="recuperar.php">¿Olvidaste tu contraseña?</a><br>

<a href="registro.php">Crear cuenta</a>

</div>

</div>

</body>
</html>