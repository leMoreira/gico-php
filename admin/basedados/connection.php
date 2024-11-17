<?php
$user = "";
$pass = "";
$pdo = new PDO('mysql:host=localhost;dbname=', $user, $pass);

if(!$pdo){
    echo "Banco de Dados não conectado";
}


?>