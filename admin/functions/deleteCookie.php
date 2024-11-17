<?php

session_start();

        unset($_SESSION['email']); // limpa
        unset($_SESSION['message']);// limpa
        unset($_SESSION['link']); // limpa
        unset($_SESSION['status']); // limpa
        $_SESSION['message'] = "Saindo do Sistema";
        $_SESSION['link'] = "./login.php";
        $_SESSION['status'] = "text-dark";

        header('location:../statusok.php');


?>