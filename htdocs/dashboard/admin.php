<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once __DIR__ . "/../config/database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['logged_in'])){

header("Location: ../login.php");
exit();

}

if($_SESSION['rol'] != "Administrador"){

header("Location: ../login.php");
exit();

}

function contar($conn,$tabla){

$sql="SELECT COUNT(*) as total FROM $tabla";

$result=$conn->query($sql);

if($result){
$row=$result->fetch_assoc();
return $row['total'];
}else{
return 0;
}

}



$autobuses = contar($conn,"autobuses");
$clientes  = contar($conn,"clientes");
$boletos   = contar($conn,"boletos");
$ventas    = contar($conn,"ventas");
$usuarios  = contar($conn,"usuarios");

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin | SIGOT 2.0</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

/* RESET */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

/* BODY */

body{
display:flex;
background:#f4f7fb;
}

/* SIDEBAR */

.sidebar{
width:250px;
background:#1d2b40;
color:white;
height:100vh;
padding:20px;
position:fixed;
}

.sidebar h2{
margin-bottom:30px;
display:flex;
align-items:center;
gap:10px;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
margin:15px 0;
padding:10px;
border-radius:8px;
transition:0.3s;
}

.sidebar a:hover{
background:#2c6cff;
}

/* MAIN */

.main{
margin-left:250px;
width:100%;
}

/* NAVBAR */

.navbar{
background:white;
padding:15px 30px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 10px rgba(0,0,0,0.05);
}

/* CARDS */

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
padding:30px;
}

.card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.card h3{
color:#777;
}

.card .number{
font-size:30px;
font-weight:bold;
color:#2c6cff;
}

/* RESPONSIVE */

@media(max-width:800px){

.sidebar{
display:none;
}

.main{
margin-left:0;
}

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2><i class="fa fa-bus"></i> SIGOT 2.0</h2>

<a href="#"><i class="fa fa-chart-line"></i> Dashboard</a>
<a href="#"><i class="fa fa-bus"></i> Autobuses</a>
<a href="#"><i class="fa fa-route"></i> Rutas</a>
<a href="#"><i class="fa fa-clock"></i> Horarios</a>
<a href="#"><i class="fa fa-ticket"></i> Boletos</a>
<a href="#"><i class="fa fa-dollar-sign"></i> Ventas</a>
<a href="#"><i class="fa fa-person"></i> Clientes</a>
<a href="usuarios/index.php"><i class="fa fa-users"></i> Usuarios</a>
<a href="#"><i class="fa fa-cog"></i> Configuración</a>

<a href="../logout.php"><i class="fa fa-sign-out-alt"></i> Cerrar sesión</a>

</div>

<!-- MAIN -->

<div class="main">

<!-- NAVBAR -->

<div class="navbar">

<h3>Bienvenido, <?php echo $_SESSION['nombre']; ?></h3>

<span>Administrador</span>

</div>

<!-- CARDS -->

<div class="cards">

<div class="card">
<h3>Autobuses</h3>
<div class="number"><?php echo $autobuses; ?></div>
</div>

<div class="card">
<h3>Clientes</h3>
<div class="number"><?php echo $clientes; ?></div>
</div>

<div class="card">
<h3>Boletos</h3>
<div class="number"><?php echo $boletos; ?></div>
</div>

<div class="card">
<h3>Ventas</h3>
<div class="number"><?php echo $ventas; ?></div>
</div>
  
<div class="card">
<h3>Usuarios</h3>
<div class="number"><?php echo $usuarios; ?></div>
</div>

</div>

</div>

</body>
</html>