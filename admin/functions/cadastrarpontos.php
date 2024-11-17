<?php
require "../basedados/connection.php";
session_start();
$prova = $_POST['prova'];
$equipe = $_POST['equipe'];
$pontos = $_POST['pontos'];

echo "<pre>";



$stmt = $pdo->prepare("INSERT INTO pontuação(id_prova, id_equipe, pontos) VALUES (?,?,?)");
$stmt->bindParam(1, $prova, PDO::PARAM_INT);
$stmt->bindParam(2, $equipe, PDO::PARAM_INT);
$stmt->bindParam(3, $pontos, PDO::PARAM_INT);


$exec = $stmt->execute();
if($exec){
    unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Pontos cadastrados com sucesso";
        $_SESSION['link'] = "./pontos.php";
        $_SESSION['status'] = "text-success";
    
        header('location:../statusok.php');
} else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Ops... Algo deu errado";
        $_SESSION['link'] = "./pontos.php";
        $_SESSION['status'] = "text-danger";
    
        header('location:../statusok.php');
}


?>
