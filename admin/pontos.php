<?php require "./components/header.php"; ?>
<?php require "./components/menu.php"; ?>
<?php require "./auth/authenticate.php"; ?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-end">
      <a href="./functions/deleteCookie.php" class="btn btn-danger">
        Sair
        <i class="bi bi-box-arrow-right"></i>
      </a>
    </div>
  </div>
</div>
<div class="container mt-5">
  <h2 class="text-right border-bottom d-flex justify-content-between py-2">
    Pontos
    <a href="./dashboard.php" class="btn btn-secondary btn-sm d-flex align-items-center"> Voltar</a>
  </h2>

  <div class="row d-flex justify-content-center">
    <a href="./registerpontos.php" class="btn btn-info my-2 w-25">Cadastrar Pontos</a>
    <div class="col-md-12  d-flex justify-content-around">
      <div class="container-fluid mt-3">
        <div class="row">

          <div class="col-md-9">
            <h3 class="text-center">Lista</h3>
            <table id="example" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Equipe</th>
                  <th scope="col">Cor</th>
                  <th scope="col">Prova</th>
                  <th scope="col">Pontos</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
<?php
$script = "
SELECT 
    pontuação.id As idponto,
    pontuação.pontos,
    pontuação.id_prova,
    pontuação.id_equipe,
    equipe.nome_equipe, 
    equipe.cor_equipe, 
    equipe.id As idequipe, 
    provas.id As idprova, 
    provas.descricao 
FROM pontuação
INNER JOIN equipe ON equipe.id = pontuação.id_equipe
INNER JOIN provas ON provas.id = pontuação.id_prova
";

$stmt = $pdo->prepare($script);
$stmt->execute();
$innerJoinPontos = $stmt->fetchAll();
?>
              <tbody>
        <?php foreach ($innerJoinPontos as $innerJoinPonto):?>      
                <tr>

                  <td><?=$innerJoinPonto['nome_equipe'];?></td>
                  <td><?=$innerJoinPonto['cor_equipe'];?></td>
                  <td><?=$innerJoinPonto['descricao'];?></td>
                  <td><?=$innerJoinPonto['pontos'];?></td>
                  <td>
                    <a href="/pontos/edit?idprova=<?=$innerJoinPonto['idprova'];?>&idequipe=<?=$innerJoinPonto['idequipe'];?>" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <button onclick="onDelete('<?=$innerJoinPonto['idponto'];?>')" class="btn btn-danger btn-sm">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
                </tr>
               <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>

                  <th scope="col">Equipe</th>
                  <th scope="col">Cor</th>
                  <th scope="col">Prova</th>
                  <th scope="col">Pontos</th>
                  <th scope="col">Ação</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- DataTables JS -->
          <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

          <!-- Ativando tabela-->
          <script>
            $("#example").DataTable()
          </script>
          <script>

            function onDelete(idequipe, idprova) {
              resposta = confirm("Tem certeza que deseja deletar essa equipe?")
              if (resposta) {
                window.location = "/pontos/delete?idequipe=" + idequipe + "&idprova=" + idprova
              }
            }
          </script>


          <div class="col-md-3">
            <h3 class="text-center">Pontuações</h3>
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
            <ol class="list-group list-group-numbered">

             <?php foreach ($fetchPontos as $totalpontos): ?>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold"><?= $totalpontos['equipe_nome'];?></div>

                </div>
                <span class="badge text-bg-primary rounded-pill"><?= $totalpontos['total_pontos'];?></span>
              </li>
              <?php endforeach; ?>

            </ol>




          </div>




        </div>
      </div>

    </div>
  </div>
</div>
</div>









<?php require "./components/footer.php"; ?>