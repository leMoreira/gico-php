<?php require './components/header.php'; ?>
<?php require './components/menu.php'; ?>
<?php require './auth/authenticate.php'; ?>
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
  <div class="row d-flex justify-content-center">
    <div class="col-md-9  d-flex justify-content-around">

      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title bg-dark text-white d-flex justify-content-center py-2">Equipes</h5>

          <p class="card-text bg-light d-flex justify-content-center">
            <i class="bi bi-people" style="font-size: 4rem;"></i>
          </p>
          <a href="./equipes.php" class="btn btn-dark w-50 ">Verificar</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title bg-dark text-white d-flex justify-content-center py-2">Provas</h5>
          <p class="card-text bg-light d-flex justify-content-center">
            <i class="bi bi-check2-square" style="font-size: 4rem;"></i>
          </p>
          <a href="./provas.php" class="btn btn-dark w-50 ">Verificar</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title bg-dark text-white d-flex justify-content-center py-2">Pontos</h5>
          <p class="card-text bg-light d-flex justify-content-center">
            <i class="bi bi-123" style="font-size: 4rem;"></i>
          </p>
          <a href="./pontos.php" class="btn btn-dark w-50 ">Verificar</a>
        </div>
      </div>

    </div>
  </div>
</div>
</div>








<?php require './components/footer.php';?>
