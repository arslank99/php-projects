<?php
  include"includes/header.php";
  if(!isset($_SESSION)){
    session_start();
 }
 if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_login'];
 } else{
    header("location: ../index.php");
 }
?>

<div class="col-md-10">
    <h1>Payment</h1> 
</div>



<?php include"includes/footer.php";?>