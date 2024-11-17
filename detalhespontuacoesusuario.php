
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <?php
  require "./functions.php";
  include("./admin/basedados/connection.php"); 
  session_start();
   ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>GICO</title>
</head>

<body>
<style>
  h4 {
    font-weight: 700;
  }

  h4 span {
    margin-left: 20px;
    color: brown;
  }

  a {
    text-decoration: none;
    color: darkblue
  }
</style>

<div class="container bg-light d-flex justify-content-center ">
  <div class="row w-100 d-flex justify-content-center ">
    <div class="col-md-12   d-flex justify-content-center ">
      <img src="/assets/logo.png" alt="" width="40%">
    </div>
  </div>
</div>
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-5">
      <a href="./index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
          class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
          <path
            d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
        </svg>

        VOLTAR
      </a>
    </div>
  </div>
</div>
<?php $nomeequipe = $_GET['nomeequipe']; ?>

<div class="container mt-2 d-flex flex-column justify-content-center  align-items-center">

  <div class="row bg-light w-100 py-3 mt-4">
    <div class="col-md-8">
      <h4>Equipe:<span><?= $nomeequipe; ?></span></h1>
    </div>
  </div>
<?php 
$script = " SELECT
              pontuação.pontos as total_pontos, equipe.nome_equipe, provas.descricao              
            FROM pontuação
            INNER JOIN equipe ON equipe.id = pontuação.id_equipe
            INNER JOIN provas ON provas.id = pontuação.id_prova
";

$stmt = $pdo->prepare($script);
$stmt->bindParam(1,$nomeequipe, PDO::PARAM_STR);
$stmt->execute();


$consultapontos = $stmt->fetchAll();

?>
  <div class="row mt-4 mb-4 w-100 bg-light py-5 d-flex justify-content-center">

    <div class="col-md-11">

      <ul class="list-group list-group-numbered">

        <?php foreach ($consultapontos as $consultaponto):?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <?= $consultaponto['descricao']; ?>
          </div>
          <span class="badge text-bg-success rounded-pill">
            <?= $consultaponto['total_pontos'];?></span>
        </li>

        <?php endforeach; ?>
     </ul>
    </div>
  </div>
</div>

