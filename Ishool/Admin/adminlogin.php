<?php 
include"../database.php";
if(!isset($_SESSION)){
   session_start();
}

if(!isset($_SESSION['admin_login'])){
    if(isset($_POST['Adminemailcheck']) && isset($_POST['adminloginemail']) 
    && isset($_POST['adminloginpassword'])){
    
      $Adminemail = $_POST['adminloginemail'];
      $Adminpassword = $_POST['adminloginpassword'];
    
      $sql = "SELECT `admin_email`,`admin_password` FROM `admin_tb` WHERE `admin_email` = '{$Adminemail}' AND `admin_password` = '{$Adminpassword}'";
      $result = mysqli_query($conn,$sql) or die("connection Failed");
      $row = mysqli_num_rows($result);
      if($row === 1 ){
        $_SESSION['admin_login'] = TRUE;
        $_SESSION['Adminemail'] = $Adminemail;
        echo json_encode($row);
      }
      else if($row === 0 ){
        echo json_encode($row);
      }
    
    }
}



?>