

<?php 
$email = $_SESSION['email'];

if ($email == '' || $email == null) {
  header('location:./login.php');
}
?>

<div class="menu container-fluid">
  <div class="row">
    <div class="navbar bg-body-tertiary">
      <div class="container d-flex justify-content-between">
        <a href="./admin.php" class="navbar-brand">

          <img src="./assets/logo.png" width="80" height="80" alt="">
        </a>



      </div>
    </div>
  </div>
</div>