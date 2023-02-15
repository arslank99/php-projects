<?php
include"../database.php";
if(!isset($_SESSION)){
session_start();
}
if(isset($_SESSION['admin_login'])){
$_SESSION['admin_login'];
} else{
header("location: ../index.php");
}
?>


<!-- delete btn capture id -->
<?php 

if (isset($_REQUEST['delete-btn'])) {
	
echo $sql = "DELETE FROM lesson_tb WHERE lesson_id = {$_REQUEST['deleteid']}";
exit();
$result = mysqli_query($conn,$sql) or die("connection_aborted");

if ($result == TRUE) {
  header("location: courses.php");
}else{
   echo "Failed to Delete";
}

}

 ?>