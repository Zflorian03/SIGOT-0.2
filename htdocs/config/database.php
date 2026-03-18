<?php

$host = "sql100.infinityfree.com";
$user = "if0_41365683";
$password = "ZairaFF260325";
$db = "if0_41365683_sigot_db";

$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
    die("Error de conexión: ".$conn->connect_error);
}

?>