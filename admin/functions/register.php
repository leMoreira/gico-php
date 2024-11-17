<?php
session_start();
include("../basedados/connection.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$script = "INSERT INTO admin(nome_completo, email, senha) VALUES (?, ?, ?)";

$query = $pdo->prepare($script);

$query->bindParam(1, $nome, PDO::PARAM_STR);
$query->bindParam(2, $email, PDO::PARAM_STR);
$query->bindParam(3, $senha, PDO::PARAM_STR);

if($query->execute())
{
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
    $_SESSION['message'] = "Usuário cadastrado com sucesso";
    $_SESSION['link'] = "./login.php";
    $_SESSION['status'] = "text-success";

    header('location:../statusok.php');
    
} else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
    $_SESSION['message'] = "Ops... Algo deu errado com o seu registro";
    $_SESSION['link'] = "./register.php";
    $_SESSION['status'] = "text-danger";
    header('location:../statusok.php');
}

