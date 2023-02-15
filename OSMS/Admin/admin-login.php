<?php
define('TITLE', "Admin Login");
define('PAGE', 'adminlogin');
include "../database.php";

session_start();
if (!isset($_SESSION['is_adminlogin'])) {

if (isset($_REQUEST['adminlogin'])) {

if ($_REQUEST['aEmail'] == "" || $_REQUEST['aPassword'] == "" ) {
$msg = "<div class ='alert alert-warning mt-2'>Please Fill The Empty Fields</div>";
}else {
$aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
$sql = "SELECT adminemail,adminpassword FROM admin_tb WHERE adminemail ='".$aEmail."' AND adminpassword = '".$aPassword."' limit 1";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
if ($result == TRUE) {
$_SESSION['is_adminlogin'] = true;
$_SESSION['aEmail'] = $aEmail;
header("location: dashboard.php");
}else {
$msg = "<div class = 'alert alert-danger mt-2'>Invalid email and Password</div>";
}
}

}

}else {
 header("location: admin-login.php");	
}




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap Css-->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Font Awesome-->
		<link rel="stylesheet" href="../css/all.min.css">
		<!-- Google Font-->
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Open+Sans:wght@300;400;500&family=Raleway:wght@100;200;300;400&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css\fontawesome\css\all.css">
		<!-- Custom Css-->
		<link rel="stylesheet" href="../css/style.css">
		<title>OSMS</title>
	</head>
	<body>
		<div class="container text-center mt-5">
			<div class="row">
				<div class="col-md-12" style="font-size: 30px;">
					<i class="fas fa-stethoscope"></i>
					<span class="">
						Online Services Management System
					</span>
					<div style="font-size:20px;">
						<p><i class="fas fa-user-secret text-danger" style="margin-right: 5px;"></i>Admin Login Area (Demo)</p>
					</div>
				</div>
			</div>
		</div>
<div class="container mt-3">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="" method="POST" class="shadow-lg p-4">
				<div class="form-group mt-2">
					<i class="fa fa-user"></i>
					<strong><label for="email">Email</label></strong>
					<input type="email" class="form-control mt-1" placeholder="Email" name="aEmail">
					<small class="form-text">We'll never share your email with anyone else. </small>
				</div>
				<div class="form-group mt-2">
					<i class="fa fa-key"></i>
					<strong><label for="password">password</label></strong>
					<input type="password" class="form-control mt-1" placeholder="Password" name="aPassword">
				</div>
				<div class="form-group">
					<button type="submit" name="adminlogin" class="btn btn-outline-danger btn-block mt-4 shadow-sm" style="width:100%;">Login</button>
					<em style="font-size:11px;">Note - By clicking Sign up you agree to our terms, Data Policy and Cookie Policy</em>
				</div>
				<div class="mt-2">
					<?php if (isset($msg)) {
					echo "$msg";
					}?>
				</div>
			</form>
			<div class="text-center shadow-sm mt-2">
				<a href="../index.php" type="submit" class="btn btn-info text-white"><strong>Back to Home</strong></a>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<?php include"includes/footer.php"; ?>