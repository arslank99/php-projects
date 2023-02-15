<?php

if (!isset($_SESSION)) {
	session_start();
}

include"../database.php";

if (!isset($_SESSION['is_login'])) {
    // session check
	if (isset($_POST['checkemail']) && isset($_POST['logemail']) &&
    isset($_POST['logpassword'])) {
	// varialbes check
	$loginemail = $_POST['logemail'];
    $loginpassword = $_POST['logpassword'];
    // query
    $sql = "SELECT stu_email,stu_password FROM student WHERE stu_email = '{$loginemail}' AND stu_password = '{$loginpassword}'";
    $result = mysqli_query($conn,$sql) or die("connection_aborted");
    $row = mysqli_num_rows($result);
    if ($row === 1) {
    $_SESSION['is_login'] = TRUE;
    $_SESSION['loginemail'] = $loginemail;
     echo json_encode($row);
    }else if ($row === 0) {
    	echo json_encode($row);
    }

}//variables bracket

	
}//session bracket



 ?>