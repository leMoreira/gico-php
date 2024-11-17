<?php
require "../basedados/connection.php";
session_start();
if (isset($_POST['salvar']))
{
    $descricao = $_POST['descricao'];
    



    $stmt = $pdo->prepare("INSERT INTO provas (descricao) VALUES (?)");
    $stmt->bindParam(1, $descricao,PDO::PARAM_STR);



    $exec = $stmt->execute();
    



    if ($exec){

    unset($_SESSION['message']);// limpa
    unset($_SESSION['link']); // limpa
    unset($_SESSION['status']); // limpa
    $_SESSION['message'] = "Prova cadastrada com sucesso";
    $_SESSION['link'] = "./provas.php";
    $_SESSION['status'] = "text-success";

     header('location:../statusok.php');


    } else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Ops... Algo deu errado";
        $_SESSION['link'] = "./provas.php";
        $_SESSION['status'] = "text-danger";

    header('location:../statusok.php');
    }
}


if(isset( $_GET['id'])){

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM provas WHERE id = ?");
    $stmt->bindParam(1,$id, PDO::PARAM_INT);

    $exec = $stmt->execute();

    if($exec){
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Prova excluída com sucesso";
        $_SESSION['link'] = "./provas.php";
        $_SESSION['status'] = "text-success";
    
        header('location:../statusok.php');

    } else {
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Ops... Algo deu errado";
        $_SESSION['link'] = "./provas.php";
        $_SESSION['status'] = "text-danger";

    header('location:../statusok.php');
    }


}




?>