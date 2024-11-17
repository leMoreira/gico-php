
<?php

require "./basedados/connection.php";
if($_SESSION['email'] == '' || $_SESSION['email'] == null){
    header('location:./login.php');
}