<?php
$user = "gico";
$pass = "Landaomo@123";
$pdo = new PDO('mysql:host=localhost;dbname=gico', $user, $pass);

if(!$pdo){
    echo "Banco de Dados não conectado";
}


?>