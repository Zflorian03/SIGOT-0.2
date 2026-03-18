<?php
require_once "config/database.php";

$mensaje="";
$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST['email'];
$password=$_POST['password'];

if(empty($email) || empty($password)){

$error="Debe completar todos los campos";

}else{

$newpass=password_hash($password,PASSWORD_DEFAULT);

$sql="UPDATE usuarios SET password=? WHERE email=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("ss",$newpass,$email);

if($stmt->execute() && $stmt->affected_rows>0){

$mensaje="Contraseña restablecida correctamente";

}else{

$error="No se encontró el correo o ocurrió un error";

}

}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Restablecer contraseña - SIGOT</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

height:100vh;

background:url("https://images.unsplash.com/photo-1563720223523-491c49f1883e")
center/cover no-repeat;

display:flex;
align-items:center;
justify-content:center;

}

/* Capa oscura para que el texto se vea */

.overlay{

position:absolute;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
backdrop-filter:blur(4px);

}

/* Tarjeta */

.card{

position:relative;

width:380px;

padding:40px;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(20px);

border-radius:20px;

color:white;

box-shadow:0 10px 30px rgba(0,0,0,0.4);

}

/* Logo */

.logo{

text-align:center;
margin-bottom:20px;

font-size:26px;
font-weight:600;

}

.logo i{

font-size:36px;
color:#4ea3ff;

}

/* Inputs */

input{

width:100%;

padding:12px;

margin:10px 0;

border:none;

border-radius:10px;

}

/* Botón */

button{

width:100%;

padding:12px;

border:none;

border-radius:10px;

background:#2c6cff;

color:white;

font-size:16px;

cursor:pointer;

margin-top:10px;

}

button:hover{

background:#1f54d3;

}

/* Mensajes */

.success{

background:#2ecc71;

padding:10px;

border-radius:10px;

margin-bottom:10px;

text-align:center;

}

.error{

background:#e74c3c;

padding:10px;

border-radius:10px;

margin-bottom:10px;

text-align:center;

}

/* link */

.link{

text-align:center;
margin-top:10px;

}

.link a{

color:#9dc6ff;
text-decoration:none;

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

<h3 style="text-align:center;margin-bottom:15px;">
Restablecer contraseña
</h3>

<?php if($mensaje!=""){ ?>
<div class="success"><?php echo $mensaje ?></div>
<?php } ?>

<?php if($error!=""){ ?>
<div class="error"><?php echo $error ?></div>
<?php } ?>

<form method="POST">

<input type="email" name="email" placeholder="Correo registrado" required>

<input type="password" name="password" placeholder="Nueva contraseña" required>

<button>Restablecer contraseña</button>

</form>

<div class="link">

<a href="login.php">Volver al login</a>

</div>

</div>

</body>
</html>