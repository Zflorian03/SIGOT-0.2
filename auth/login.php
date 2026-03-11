<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | SIGOT Transporte</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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
display:flex;
justify-content:center;
align-items:center;

}

/* overlay oscuro */

.overlay{

background:rgba(0,0,0,0.55);
backdrop-filter:blur(5px);
width:100%;
height:100%;
display:flex;
justify-content:center;
align-items:center;

}

/* tarjeta login */

.login-card{

background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
border-radius:20px;
padding:50px 40px;
width:380px;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,0.3);
text-align:center;

}

.login-card h2{

margin-bottom:25px;
font-weight:600;

}

.input-group{

margin-bottom:20px;
text-align:left;

}

.input-group label{

font-size:14px;

}

.input-group input{

width:100%;
padding:10px;
border:none;
border-radius:10px;
margin-top:5px;
outline:none;

}

/* boton */

.login-btn{

width:100%;
padding:12px;
border:none;
border-radius:25px;
background:#2b7cff;
color:white;
font-weight:600;
cursor:pointer;
transition:0.3s;

}

.login-btn:hover{

background:#1c5ed9;

}

/* links */

.links{

margin-top:15px;
font-size:14px;

}

.links a{

color:white;
text-decoration:none;
display:block;
margin-top:6px;

}

.links a:hover{

text-decoration:underline;

}

/* logo */

.logo{

font-size:26px;
font-weight:700;
margin-bottom:10px;

}

/* responsive */

@media(max-width:450px){

.login-card{

width:90%;

}

}

</style>

</head>

<body>

<div class="overlay">

<div class="login-card">

<div class="logo">SIGOT</div>

<h2>Acceso al Sistema</h2>

<form action="login_process.php" method="POST">

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Contraseña</label>
<input type="password" name="password" required>
</div>

<button class="login-btn">Iniciar Sesión</button>

</form>

<div class="links">

<a href="recover.php">¿Olvidaste tu contraseña?</a>

<a href="register.php">Crear cuenta de cliente</a>

<a href="../index.php">Volver al inicio</a>

</div>

</div>

</div>

</body>
</html>