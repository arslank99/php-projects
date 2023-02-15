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

 $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
 $result = mysqli_query($conn,$sql) or die("connection_aborted");

if ($result == TRUE) {
  header("location: students.php");
}else{
   echo "Failed to Delete";
}

}

 ?>