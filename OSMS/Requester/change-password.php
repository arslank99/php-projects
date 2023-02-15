<?php
include"includes/header.php";
include"../database.php";
session_start();
if($_SESSION['is_login']) {
$email = $_SESSION['email'];
}else {
	header("location:requester-login.php");
}

//this is select query 
$sql = "SELECT u_password,u_email FROM login_tb WHERE u_email = '$email'";
$result = mysqli_query($conn,$sql) or die("connection failed");

if (mysqli_num_rows($result) == 1) {
$row = mysqli_fetch_assoc($result);
$rPassword = $row['u_password'];

}


//this is update query 
if (isset($_REQUEST['update'])) {

if ($_REQUEST['rPassword'] == ""){
$msg = "<div class='alert alert-warning'>Fill the Password field</div>";
}else{
$rPassword = $_REQUEST['rPassword'];
$sql = "UPDATE login_tb SET u_password = '$rPassword' WHERE u_email = '$email'";
if (mysqli_query($conn,$sql) == TRUE ) {
$msg = "<div class='alert alert-success'>Password Updated Successfully</div>";
} else{
$msg = "<div class='alert alert-danger'>Password Not Updated Successfully</div>";
}
}

}

?>

<div class="col-sm-12 col-md-4 mt-2 ms-4">

<form action="" method="POST">
     <div class="form-group mb-3" >
          <strong><label for="name">Email:</label></strong>
          <input type="email" name="rEmail" id="rEmail" class="form-control" 
           value="<?php echo $email;?>" readonly>
     </div>
     <div class="form-group" >
          <strong><label for="password">Password:</label></strong>
          <input type="password" name="rPassword" id="rPassword" class="form-control" 
           value="<?php echo $rPassword;?>">
     </div>
     <div class="mt-2">
          <?php if (isset($msg)){ echo $msg;}?>
     </div>
     <div class="form-group mt-3">
          <button type="submit" class="btn btn-danger" name="update">Update</button>
          <button type="submit" class="btn btn-secondary" name="reset">Reset</button>
     </div>
</form>

</div>

<?php include"includes/footer.php"; ?>