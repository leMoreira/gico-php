
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <?php session_start(); ?>
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
  #splash {
    display: block;
  }

  #imglogo {
    width: 20px;
    transition: ease-in 0.8s;
  }

  #pontuacoes {
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
</style>
<!-- <div class="container bg-dark">
  <div class="row">
    <div class="col-md-12 py-2">
      <a href="/admin" class="btn btn-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video3"
          viewBox="0 0 16 16">
          <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2" />
          <path
            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783Q16 12.312 16 12V4a2 2 0 0 0-2-2z" />
        </svg>
        Login
      </a>
    </div>
  </div>
</div> -->
<?php include("./admin/basedados/connection.php"); ?>


<div class="container-fluid bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="row w-100 " style="height: 100%; width: 100%;">
    <div class="col-sm-12 col-md-12 d-flex justify-content-center align-items-center w-100">

      <div id="splash">
        <img src="./admin/assets/logo.png" alt="" id="imglogo">
      </div>

      <div id="pontuacoes" class="w-75">
        <img src="./admin/assets/logo.png" width="200" width="200" alt="logo Gico">

        <table class="table table-striped w-100">
          <thead>
            <tr>

              <th scope="col">Equipes</th>
              <th scope="col">Total</th>
              <th scope="col">Provas</th>

            </tr>
          </thead>
          <?php
$script2 = "
SELECT 
    equipe.nome_equipe as equipe_nome, 
    sum(pontuação.pontos) as total_pontos
FROM equipe
INNER JOIN pontuação on equipe.id = pontuação.id_equipe
GROUP BY equipe.nome_equipe ORDER BY total_pontos
";

$innerTotal = $pdo->prepare($script2);
$innerTotal->execute();

$fetchPontos = $innerTotal->fetchAll();



?>



          <tbody>
            <?php foreach ($fetchPontos as $pontos): ?>
            <tr>
              <td><?= $pontos['equipe_nome']; ?> </td>
              <td><?= $pontos['total_pontos']; ?> </td>
              <td>
                <a href="./detalhespontuacoesusuario.php?nomeequipe=<?= $pontos['equipe_nome']; ?> " class="btn btn-outline-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-ruled" viewBox="0 0 16 16">
                    <path
                      d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1zm9 6H6v2h7zm0 3H6v2h7zm0 3H6v2h6a1 1 0 0 0 1-1zm-8 2v-2H3v1a1 1 0 0 0 1 1zm-2-3h2v-2H3zm0-3h2V7H3z" />
                  </svg>
                </a>
              </td>
            </tr>
           <?php endforeach; ?>
          </tbody>
        </table>

      </div>


    </div>
  </div>
</div>


<script>
  let splash = document.getElementById("splash");
  let imglogo = document.getElementById("imglogo");
  let pontuacoes = document.getElementById("pontuacoes");

  setTimeout(() => {
    imglogo.style.width = "350px";

    setTimeout(() => {
      imglogo.style.width = "320px";
      setTimeout(() => {
        imglogo.style.width = "355px";
        setTimeout(() => {
          imglogo.style.width = "0";

          setTimeout(() => {
            splash.style.display = "none";
            pontuacoes.style.display = "flex";

          }, 1000);
        }, 1200);

      }, 1000);
    }, 1000);

  }, 1500);






</script>


<?php require "./admin/components/footer.php"; ?>