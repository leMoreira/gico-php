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
    Provas
    <a href="./dashboard.php" class="btn btn-secondary btn-sm d-flex align-items-center"> Voltar</a>
  </h2>

  <div class="row d-flex justify-content-center">
    <div class="col-md-9  d-flex justify-content-around">



      <div class="container mt-3">
        <div class="row">
          <div class="col-md-7">
            <h3 class="text-center">Lista</h3>




            <table id="minhaTabela" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
<?php 
$stmt = $pdo->prepare("SELECT * FROM provas");
$stmt->execute();
$provas = $stmt->fetchAll();


?>




              <tbody>
<?php foreach ($provas as $prova):?>
                <tr>
                  <td scope="row"><?=$prova['id']?></td>
                  <td><?=$prova['descricao']?></td>
                  <td>
                    <!-- <a href="/equipes/edit?id=<?=$prova['id']?>" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a> -->
                    <button onclick="onDelete('<?=$prova['id']?>')" class="btn btn-danger btn-sm">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
                </tr>
             <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cor</th>
                  <th scope="col">Ação</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- DataTables JS -->
          <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

          <!-- Ativando tabela-->
          <script>
            $("#minhaTabela").DataTable()
          </script>
          <script>



            function onDelete(id) {
              resposta = confirm("Tem certeza que deseja deletar essa equipe?")
              if (resposta) {
                window.location = "./functions/provas.php?id=" + id
              }
            }
          </script>

          <div class="col-md-5">
            <h3 class="text-center">Cadastrar</h3>

            <form action="./functions/provas.php" method="POST">
              <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao" placeholder="" class="form-control">
              </div>
             
              <div class="mb-3 d-flex justify-content-end">
                <button type="submit" name="salvar" class="btn btn-primary btn-sm">Salvar</button>
              </div>
            </form>

          </div>


        </div>
      </div>


    </div>
  </div>
</div>
</div>









<?php require "./components/footer.php"; ?>