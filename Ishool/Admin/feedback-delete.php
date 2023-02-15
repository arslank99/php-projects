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

<?php 

if (isset($_REQUEST['delete-btn'])) {
 $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['deleteid']}";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
if ($result == TRUE) {
  header("location: courses.php");
}else{
   echo "Failed to Delete";
}
}

 ?>