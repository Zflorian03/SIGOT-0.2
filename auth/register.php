<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Crear Cuenta | SIGOT</title>

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
width:380px;
color:white;
box-shadow:0 10px 25px rgba(0,0,0,0.3);

}

.card h2{

text-align:center;
margin-bottom:20px;

}

.input-group{

margin-bottom:15px;

}

.input-group input{

width:100%;
padding:10px;
border:none;
border-radius:10px;
margin-top:5px;

}

.btn{

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

<h2>Crear Cuenta</h2>

<form action="register_process.php" method="POST">

<div class="input-group">
<input type="text" name="nombre" placeholder="Nombre completo" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Correo electrónico" required>
</div>

<div class="input-group">
<input type="password" name="password" placeholder="Contraseña" required>
</div>

<button class="btn">Registrarse</button>

</form>

<div class="links">

<a href="login.php">Ya tengo cuenta</a>

</div>

</div>

</div>

</body>
</html>