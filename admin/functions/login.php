<?php

session_start();
include("../basedados/connection.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
$query->bindParam(1,$email);
$query->execute();
$count = $query->rowCount();

if ($count > 0) {

    $result = $query->fetch(PDO::FETCH_ASSOC);

    $conferePassword = password_verify($senha, $result['senha']);

    if($conferePassword){

        $_SESSION['email'] = $email;
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Usuário Aceito";
        $_SESSION['link'] = "./dashboard.php";
        $_SESSION['status'] = "text-success";
        header('location:../statusok.php');
    } else {
        
        unset($_SESSION['email']);
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "E-mail ou senha não confere";
        $_SESSION['link'] = "./login.php";
        $_SESSION['status'] = "text-danger";

        header('location:../statusok.php');
   
    }

} else {
   
    $_SESSION['message'] = "E-mail ou senha não confere";
    $_SESSION['link'] = "./login.php";
    $_SESSION['status'] = "text-danger";

    header('location:../statusok.php');
}




