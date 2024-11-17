<?php require './components/header.php';?>
<link rel="stylesheet" href="./assets/login.css">

<div class="container login">
  <img src="./assets/logo.png" alt="" width="20%">
  <div class="row">
    <form action="./functions/register.php" method="post" onsubmit="myProcess()">
      <div class="mb-3">
        <label for="nome" class="form-label">
          Nome Completo
        </label>
        <input type="text" name="nome" id="nome" class="form-control" />
      </div>
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
          <span role="status" id="loading_text">Registrando...</span>
          <span role="status" id="status">Register</span>
        </button>
      </div>
    </form>
    <p class="text-right w-100"><a href="./login.php">Quero fazer o Login</a></p>
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