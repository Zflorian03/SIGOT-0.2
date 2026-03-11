<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$host = "sql100.infinityfree.com";
$user = "if0_41365683";
$password = "ZairaFF260325";
$database = "if0_41365683_sigot";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error){
    die("Error de conexión: ".$conn->connect_error);
}

/* CONTROL DE SESION SEGURO */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>