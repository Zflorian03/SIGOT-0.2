<?php
require_once __DIR__ . "/../../config/database.php";

session_start();

if(!isset($_SESSION['logged_in'])){
header("Location: ../../login.php");
exit();
}

$result = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Usuarios | SIGOT 2.0</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

body{
font-family:'Poppins',sans-serif;
background:#f4f7fb;
padding:30px;
}

h1{
margin-bottom:20px;
}

.top{
display:flex;
justify-content:space-between;
margin-bottom:20px;
}

.btn{
padding:10px 20px;
border:none;
border-radius:8px;
cursor:pointer;
}

.btn-add{
background:#2c6cff;
color:white;
}

table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
}

th,td{
padding:15px;
text-align:left;
}

th{
background:#2c6cff;
color:white;
}

tr:nth-child(even){
background:#f2f2f2;
}

.actions a{
margin-right:10px;
text-decoration:none;
}

.edit{
color:#f39c12;
}

.delete{
color:#e74c3c;
}

</style>
</head>

<body>

<div class="top">
<h1>Usuarios</h1>

<a href="crear.php">
<button class="btn btn-add">+ Nuevo Usuario</button>
</a>
</div>

<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Rol</th>
<th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['nombre'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['rol'] ?></td>

<td class="actions">

<a class="edit" href="editar.php?id=<?= $row['id'] ?>">
<i class="fa fa-edit"></i>
</a>

<a class="delete" href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar usuario?')">
<i class="fa fa-trash"></i>
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>