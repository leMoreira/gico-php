<?php
require "../basedados/connection.php";
session_start();
if (isset($_POST['salvar']))
{
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];

    $stmt = $pdo->prepare("INSERT INTO equipe (nome_equipe, cor_equipe) VALUES (?,?)");
    $stmt->bindParam(1, $nome,PDO::PARAM_STR);
    $stmt->bindParam(2, $cor, PDO::PARAM_STR);

    $exec = $stmt->execute();
    



    if ($exec){

    unset($_SESSION['message']);// limpa
    unset($_SESSION['link']); // limpa
    unset($_SESSION['status']); // limpa
    $_SESSION['message'] = "Equipe cadastrada com sucesso";
    $_SESSION['link'] = "./equipes.php";
    $_SESSION['status'] = "text-success";

    header('location:../statusok.php');


    } else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Ops... Algo deu errado";
        $_SESSION['link'] = "./equipes.php";
        $_SESSION['status'] = "text-danger";

    header('location:../statusok.php');
    }
}


if(isset( $_GET['id'])){

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM equipe WHERE id = ?");
    $stmt->bindParam(1,$id, PDO::PARAM_INT);

    $exec = $stmt->execute();

    if($exec){
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Equipe excluída com sucesso";
        $_SESSION['link'] = "./equipes.php";
        $_SESSION['status'] = "text-success";
    
        header('location:../statusok.php');

    } else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Ops... Algo deu errado";
        $_SESSION['link'] = "./equipes.php";
        $_SESSION['status'] = "text-danger";

    header('location:../statusok.php');
    }


}




?>