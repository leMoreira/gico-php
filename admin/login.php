<?php require './components/header.php';?>
<link rel="stylesheet" href="./assets/login.css">

<div class="container d-flex login">
  <img src="./assets/logo.png" alt="" width="20%">
  <div class="row">
    <form action="./functions/login.php" method="POST" onsubmit="myProcess()">
      <div class="mb-3">
        <label for="email" class="form-label">
          E-mail
        </label>
        <input type="email" name="email" id="email" class="form-control" />
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">
          Senha
        </label>
        <input type="password" name="senha" id="senha" class="form-control" />
      </div>

      <div class="mb-3">
        <button class="btn btn-info w-50" type="submit" id="process">
          <span class="spinner-border spinner-border-sm" aria-hidden="true" id="loading_process"></span>
          <span role="status" id="loading_text">Entrando...</span>
          <span role="status" id="status">Logar</span>
        </button>
      </div>
    </form>
    <div class="linha d-flex justify-content-between w-100 bg-light py-1">
      <!-- <p class=" w-75"><a href="./register.php">Quero fazer o cadastro</a></p> -->
      <!-- <p class=" w-75"><a href="/esqueceusenha">Esqueci minha senha.</a></p> -->
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
  let loading_process = document.getElementById("loading_process")
  let loading_text = document.getElementById("loading_text")
  let btn_process = document.getElementById("process")
  let loading_status = document.getElementById("status")
  loading_process.style.display = "none"
  loading_text.style.display = "none"

  function myProcess() {

    loading_process.style.display = "block"
    loading_text.style.display = "block"
    loading_status.style.display = "none"

  }

</script>

<?php require './components/footer.php';?>