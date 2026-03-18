<?php
session_start();

if(isset($_SESSION['logged_in'])){
header("Location: dashboard/admin.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SIGOT | Transporte de Autobuses</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f7fb;
color:#333;
}

/* NAVBAR */

nav{

display:flex;
justify-content:space-between;
align-items:center;
padding:20px 8%;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,0.08);

}

.logo{

font-size:24px;
font-weight:700;
color:#2c6cff;
display:flex;
align-items:center;
gap:10px;

}

.logo i{

font-size:28px;

}

nav ul{

display:flex;
gap:30px;
list-style:none;

}

nav a{

text-decoration:none;
color:#333;
font-weight:500;

}

.nav-buttons button{

padding:10px 20px;
border-radius:25px;
border:none;
cursor:pointer;

}

.login-btn{

background:#2c6cff;
color:white;

}

.register-btn{

background:#eef3ff;
color:#2c6cff;

}

/* HERO */

.hero{

height:90vh;

background:url("https://images.unsplash.com/photo-1593950315186-76a92975b60c")
center/cover no-repeat;

display:flex;
align-items:center;
justify-content:center;
position:relative;

}

.hero::after{

content:"";
position:absolute;
width:100%;
height:100%;
background:rgba(0,0,0,0.55);
backdrop-filter:blur(3px);

}

.hero-content{

position:relative;
color:white;
text-align:center;
max-width:700px;

}

.hero h1{

font-size:55px;
margin-bottom:15px;

}

.hero p{

font-size:20px;
margin-bottom:30px;

}

.hero button{

padding:15px 35px;
border-radius:30px;
border:none;
font-size:16px;
cursor:pointer;
background:#2c6cff;
color:white;

}

/* SERVICES */

.services{

padding:80px 10%;

display:grid;

grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

gap:30px;

}

.service{

background:white;
padding:30px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,0.08);

text-align:center;

}

.service i{

font-size:40px;
color:#2c6cff;
margin-bottom:10px;

}

/* ABOUT */

.about{

display:grid;
grid-template-columns:1fr 1fr;
gap:40px;
padding:80px 10%;

align-items:center;

}

.about img{

width:100%;
border-radius:15px;

}

.about h2{

font-size:36px;
margin-bottom:15px;

}

/* GALLERY */

.gallery{

padding:80px 10%;

}

.gallery h2{

text-align:center;
margin-bottom:40px;

}

.gallery-grid{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

gap:20px;

}

.gallery img{

width:100%;
border-radius:10px;

}

/* FOOTER */

footer{

background:#1d2b40;
color:white;
text-align:center;
padding:30px;

}

/* RESPONSIVE */

@media(max-width:900px){

.about{

grid-template-columns:1fr;

}

.hero h1{

font-size:40px;

}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav>

<div class="logo">
<i class="fa-solid fa-bus"></i>
SIGOT
</div>

<ul>

<li><a href="#">Inicio</a></li>
<li><a href="#">Servicios</a></li>
<li><a href="#">Nosotros</a></li>
<li><a href="#">Rutas</a></li>

</ul>

<div class="nav-buttons">

<a href="login.php">
<button class="login-btn">Iniciar sesión</button>
</a>

<a href="registro.php">
<button class="register-btn">Crear cuenta</button>
</a>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<div class="hero-content">

<h1>Transporte Seguro en Autobuses</h1>

<p>Viaja por toda República Dominicana con comodidad, seguridad y puntualidad.</p>

<a href="login.php">
<button>Reservar boleto</button>
</a>

</div>

</section>

<!-- SERVICIOS -->

<section class="services">

<div class="service">

<i class="fa fa-bus"></i>

<h3>Flota Moderna</h3>

<p>Autobuses equipados con aire acondicionado y asientos cómodos.</p>

</div>

<div class="service">

<i class="fa fa-route"></i>

<h3>Rutas Nacionales</h3>

<p>Conectamos las principales ciudades de República Dominicana.</p>

</div>

<div class="service">

<i class="fa fa-ticket"></i>

<h3>Compra de Boletos</h3>

<p>Compra tus boletos de forma rápida desde el sistema.</p>

</div>

</section>

<!-- ABOUT -->

<section class="about">

<img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70">

<div>

<h2>Sobre SIGOT 2.0</h2>

<p>

SIGOT 2.0 es un sistema de gestión y empresa de transporte en autobuses
diseñado para ofrecer viajes seguros, organizados y eficientes
en toda la República Dominicana.

</p>

</div>

</section>

<!-- GALERIA -->

<section class="gallery">

<h2>Nuestra Flota</h2>

<div class="gallery-grid">

<img src="https://images.unsplash.com/photo-1563720223523-491c49f1883e">

<img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957">

<img src="https://images.unsplash.com/photo-1593950315186-76a92975b60c">

<img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc">

</div>

</section>

<!-- FOOTER -->

<footer>

<p>© 2026 SIGOT 2.0| Sistema de Gestión de Transporte</p>

<p>República Dominicana</p>

</footer>

</body>

</html>