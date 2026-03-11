<?php

session_start();

if(!isset($_SESSION['usuario'])){
header("Location: ../auth/login.php");
exit();
}

require_once("../config/database.php");

/* CONTADORES */

$clientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];

$boletos = 0;
$autobuses = 0;

/* si luego creas tablas se conectarán automáticamente */

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Administrador | SIGOT</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

background-image:url("https://images.unsplash.com/photo-1544620347-c4fd4a3d5957");
background-size:cover;
background-position:center;
height:100vh;

}

.overlay{

background:rgba(0,0,0,0.55);
backdrop-filter:blur(6px);
min-height:100vh;

}

/* NAVBAR */

.navbar{

display:flex;
justify-content:space-between;
align-items:center;
padding:20px 40px;
color:white;

}

.logo{

font-size:24px;
font-weight:600;

}

.logout{

background:#ff4b4b;
padding:10px 18px;
border:none;
border-radius:20px;
color:white;
cursor:pointer;

}

/* CONTENEDOR */

.container{

padding:40px;

}

/* ESTADISTICAS */

.stats{

display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:25px;
margin-bottom:40px;

}

.stat-card{

background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
padding:25px;
border-radius:15px;
color:white;
box-shadow:0 10px 25px rgba(0,0,0,0.3);

}

.stat-card i{

font-size:28px;
margin-bottom:10px;

}

.stat-card h2{

font-size:30px;

}

/* MODULOS */

.modules{

display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;

}

.module{

background:rgba(255,255,255,0.18);
backdrop-filter:blur(15px);
padding:30px;
border-radius:15px;
color:white;
text-align:center;
cursor:pointer;
transition:0.3s;

}

.module:hover{

transform:translateY(-5px);
background:rgba(255,255,255,0.25);

}

.module i{

font-size:40px;
margin-bottom:15px;

}

.module h3{

font-size:18px;

}

</style>

</head>

<body>

<div class="overlay">

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
SIGOT Admin
</div>

<div>
Usuario: <?php echo $_SESSION['usuario']; ?>
<a href="../auth/logout.php">
<button class="logout">Cerrar Sesión</button>
</a>
</div>

</div>

<div class="container">

<!-- ESTADISTICAS -->

<div class="stats">

<div class="stat-card">
<i class="fa-solid fa-bus"></i>
<h2><?php echo $autobuses; ?></h2>
<p>Autobuses</p>
</div>

<div class="stat-card">
<i class="fa-solid fa-ticket"></i>
<h2><?php echo $boletos; ?></h2>
<p>Boletos vendidos</p>
</div>

<div class="stat-card">
<i class="fa-solid fa-users"></i>
<h2><?php echo $clientes; ?></h2>
<p>Clientes</p>
</div>

<div class="stat-card">
<i class="fa-solid fa-chart-line"></i>
<h2>0</h2>
<p>Ventas hoy</p>
</div>

</div>

<!-- MODULOS -->

<div class="modules">

<div class="module">
<i class="fa-solid fa-bus"></i>
<h3>Autobuses</h3>
</div>

<div class="module">
<i class="fa-solid fa-road"></i>
<h3>Rutas</h3>
</div>

<div class="module">
<i class="fa-solid fa-clock"></i>
<h3>Horarios</h3>
</div>

<div class="module">
<i class="fa-solid fa-ticket"></i>
<h3>Boletos</h3>
</div>

<div class="module">
<i class="fa-solid fa-cash-register"></i>
<h3>Ventas</h3>
</div>

<div class="module">
<i class="fa-solid fa-users"></i>
<h3>Clientes</h3>
</div>

<div class="module">
<i class="fa-solid fa-chart-pie"></i>
<h3>Reportes</h3>
</div>

<div class="module">
<i class="fa-solid fa-gear"></i>
<h3>Configuración</h3>
</div>

</div>

</div>

</div>

</body>
</html>