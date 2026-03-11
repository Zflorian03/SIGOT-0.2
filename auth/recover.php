<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recuperar Contraseña | SIGOT</title>

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
display:flex;
justify-content:center;
align-items:center;

}

.overlay{

background:rgba(0,0,0,0.55);
backdrop-filter:blur(6px);
width:100%;
height:100%;
display:flex;
justify-content:center;
align-items:center;

}

.card{

background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
padding:40px;
border-radius:18px;
width:360px;
color:white;

}

.card h2{

text-align:center;
margin-bottom:20px;

}

input{

width:100%;
padding:10px;
border:none;
border-radius:10px;
margin-bottom:15px;

}

button{

width:100%;
padding:12px;
border:none;
border-radius:25px;
background:#2b7cff;
color:white;
font-weight:600;
cursor:pointer;

}

.links{

margin-top:15px;
text-align:center;

}

.links a{

color:white;
text-decoration:none;

}

</style>

</head>

<body>

<div class="overlay">

<div class="card">

<h2>Recuperar Contraseña</h2>

<form action="recover_process.php" method="POST">

<input type="email" name="email" placeholder="Ingresa tu correo" required>

<input type="password" name="password" placeholder="Nueva contraseña" required>

<button>Cambiar contraseña</button>

</form>

<div class="links">

<a href="login.php">Volver al login</a>

</div>

</div>

</div>

</body>
</html>