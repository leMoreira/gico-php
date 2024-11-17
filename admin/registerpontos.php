<?php require "./components/header.php"; ?>
<?php require "./components/menu.php"; ?>
<?php require "./auth/authenticate.php"; ?>

<link rel="stylesheet" href="/assets/login.css">

<div class="container mt-5">
  <h2 class="text-right border-bottom d-flex justify-content-between py-2">
    Registrar Pontos
    <a href="./pontos.php" class="btn btn-secondary btn-sm d-flex align-items-center"> Voltar</a>
  </h2>
  <div class="row mt-5 d-flex justify-content-center">

    <div class="col-md-6 mt-5">

      <form action="./functions/cadastrarpontos.php" method="post">
        <div class="mb-3">
          <label for="prova" class="form-label">
            Prova
          </label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="prova">
            <option selected>Escolha a Prova</option>
 <?php 
 $p = $pdo->prepare("SELECT * FROM provas");
 $p->execute();
 $p_desc = $p->fetchAll();
 ?>
 <?php foreach ($p_desc as $desc):?>
            <option value="<?=$desc['id'];?>"><?=$desc['descricao'];?></option>
           <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="equipe" class="form-label">
            Equipe
          </label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="equipe">
            <option selected>Escolha a equipe</option>
            <?php 
 $e = $pdo->prepare("SELECT * FROM equipe");
 $e->execute();
 $e_nome = $e->fetchAll();
 ?>
 <?php foreach ($e_nome as $nomee):?>
            <option value="<?= $nomee['id']; ?>"><?= $nomee['nome_equipe']; ?></option>

           <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="pontos" class="form-label">
            Pontos
          </label>
          <input type="number" name="pontos" id="pontos" class="form-control" />
        </div>

        <div class="mb-3">
          <button class="btn btn-info w-50" type="submit" >
            Registrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4">

    </div>
  </div>
</div>

<script>

  // Condição para select




  

</script>









<?php require "./components/footer.php"; ?>