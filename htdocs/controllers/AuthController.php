<?php

session_start();

require_once "../models/Usuario.php";

$action=$_GET['action'] ?? '';

if($action=="login"){

$email=$_POST['usuario'];
$password=$_POST['password'];

$userModel=new Usuario();

$result=$userModel->login($email,$password);

if($result['success']){

$user=$result['user'];

$_SESSION['user_id']=$user['id_usuario'];
$_SESSION['nombre']=$user['nombre'];
$_SESSION['rol']=$user['rol'];
$_SESSION['logged_in']=true;

switch($user['rol']){

case "Administrador":
header("Location: ../dashboard/admin.php");
break;

case "Supervisor":
header("Location: ../dashboard/supervisor.php");
break;

case "Operador":
header("Location: ../dashboard/operador.php");
break;

case "Cliente":
header("Location: ../dashboard/cliente.php");
break;

}

exit();

}else{

$_SESSION['error']=$result['message'];

header("Location: ../login.php");

}

}