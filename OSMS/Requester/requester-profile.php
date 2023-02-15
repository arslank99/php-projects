<?php 
include"../database.php";
session_start();
if ($_SESSION['is_login']) {
	$email = $_SESSION['email'];
}else{
    header('location: requester-login.php');
}
?>

<!-- This is select code -->
<?php 
$sql = "SELECT u_email,u_name FROM login_tb WHERE u_email = '".$email."'";
$result = mysqli_query($conn,$sql) or die('connection_aborted');
if (mysqli_num_rows($result) == 1 ) {
$row = mysqli_fetch_assoc($result);
$u_name = $row['u_name'];
}
?>

<!-- This is update code -->

<?php 
if (isset($_REQUEST['update'])) {

if ($_REQUEST['rName'] == "") {
$msg = "<div class='alert alert-warning' mt-2>You can't left this field empty</div>";
}else{
$name = $_REQUEST['rName'];
$sqlite = "UPDATE login_tb SET u_name ='".$name."' WHERE u_email ='".$email."' ";
$conclusion = mysqli_query($conn,$sqlite) or die('connection_aborted');
if ( $conclusion == TRUE) {
$msg = "<div class='alert alert-success' mt-2>Your data updated successfully</div>";
}else{
$msg = "<div class='alert alert-danger' mt-2>Your Data updated not successfully</div>";
}
}
	
}


 ?>

<?php include"includes/header.php"; ?>

<div class="col-md-5 mt-2">
	<form action="" method="POST">
		<div class="form-group mb-3" >
			<strong><label for="name">Email:</label></strong>
			<input type="email" name="rEmail" id="rEmail" class="form-control" 
			 value="<?php echo $email; ?>"readonly>
		</div>
		<div class="form-group" >
			<strong><label for="name">Name:</label></strong>
			<input type="text" name="rName" id="rName" class="form-control" value="<?php echo $u_name; ?>">
		</div>
		<div class="form-group mt-3">
			<button type="submit" class="btn btn-danger" name="update">Update</button>
		</div>
		<div class="mt-2"><?php if (isset($msg)){echo $msg;}?></div>
	</form>
</div>
<div class="col-md-5"></div>

<?php include"includes/footer.php"; ?>