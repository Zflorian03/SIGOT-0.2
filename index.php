<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SIGOT | Sistema de Gestión de Transporte</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

/* FONDO CON AUTOBUS */

body{

background-image:url("https://images.unsplash.com/photo-1544620347-c4fd4a3d5957");
background-size:cover;
background-position:center;
height:100vh;
display:flex;
flex-direction:column;

}

/* OVERLAY OSCURO */

.overlay{

background:rgba(0,0,0,0.55);
backdrop-filter:blur(4px);
height:100vh;
display:flex;
flex-direction:column;

}

/* NAVBAR */

.navbar{

display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
color:white;

}

.logo{

font-size:24px;
font-weight:700;
letter-spacing:2px;

}

.nav-buttons a{

text-decoration:none;
margin-left:15px;

}

.btn{

padding:10px 20px;
border-radius:25px;
border:none;
cursor:pointer;
font-weight:600;
transition:0.3s;

}

.btn-login{

background:white;
color:#2b7cff;

}

.btn-login:hover{

background:#dfeaff;

}

.btn-register{

background:#2b7cff;
color:white;

}

.btn-register:hover{

background:#1c5ed9;

}

/* HERO */

.hero{

flex:1;
display:flex;
justify-content:center;
align-items:center;
text-align:center;
padding:40px;

}

/* TARJETA CENTRAL */

.hero-card{

background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
border-radius:20px;
padding:60px;
max-width:750px;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,0.3);

}

.hero-card h1{

font-size:42px;
margin-bottom:15px;

}

.hero-card p{

font-size:18px;
margin-bottom:35px;
line-height:1.6;

}

.hero-buttons{

display:flex;
justify-content:center;
gap:20px;

}

.hero-buttons a{

text-decoration:none;

}

.main-btn{

padding:14px 28px;
border-radius:30px;
font-size:16px;
font-weight:600;
transition:0.3s;

}

.btn-primary{

background:#2b7cff;
color:white;

}

.btn-primary:hover{

background:#1c5ed9;

}

.btn-secondary{

background:white;
color:#2b7cff;

}

.btn-secondary:hover{

background:#e4ecff;

}

/* FOOTER */

.footer{

text-align:center;
color:white;
padding:15px;
font-size:14px;

}

/* RESPONSIVE */

@media(max-width:768px){

.hero-card{

padding:40px 25px;

}

.hero-card h1{

font-size:30px;

}

.hero-buttons{

flex-direction:column;

}

.navbar{

padding:20px;

}

}

</style>
</head>

<body>

<div class="overlay">

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
SIGOT Transport
</div>

<div class="nav-buttons">

<a href="auth/login.php">
<button class="btn btn-login">Iniciar Sesión</button>
</a>

<a href="auth/register.php">
<button class="btn btn-register">Crear Cuenta</button>
</a>

</div>

</div>

<!-- HERO -->

<div class="hero">

<div class="hero-card">

<h1>Sistema Inteligente de Gestión de Transporte</h1>

<p>
Administra autobuses, rutas, clientes y venta de boletos desde una sola plataforma.
Una solución moderna diseñada para empresas de transporte que buscan eficiencia,
control y crecimiento digital.
</p>

<div class="hero-buttons">

<a href="auth/login.php">
<button class="main-btn btn-primary">Acceder al Sistema</button>
</a>

<a href="auth/register.php">
<button class="main-btn btn-secondary">Registrarse como Cliente</button>
</a>

</div>

</div>

</div>

<div class="footer">

© 2026 SIGOT - Sistema de Gestión de Transporte

</div>

</div>

</body>
</html>