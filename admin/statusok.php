<?php require './components/header.php';?>

<?php

$message = $_SESSION['message'];
$link = $_SESSION['link'];
$status = $_SESSION['status'];


?>


<div class="container mt-5">
  <div class="row d-flex justify-content-center align-items-center py-5">
    <div class="col-md-6 bg-light d-flex justify-content-center align-items-center py-5">

      <div class="d-flex align-items-center w-75">
        <strong role="status" class="{{.status}}"><?=$message;?></strong>
        <div class="spinner-border ms-auto <?=$status;?>" style="width: 7rem; height: 7rem;" aria-hidden="true"></div>
      </div>

      <script>
        setTimeout(() => {
          window.location.href = "<?=$link;?>"
        }, 3000);
      </script>


    </div>
  </div>
</div>
<?php require './components/footer.php';?>