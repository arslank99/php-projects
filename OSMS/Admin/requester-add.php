<?php
include"includes/header.php"; 
include "../database.php";
session_start();
if ($_SESSION['is_adminlogin']) {
 $aEmail = $_SESSION['aEmail'];
}else {
  header("location: adminlogin.php");
}
?>

<?php
if (isset($_REQUEST['add'])) {
	if($_REQUEST['uname'] == "" || $_REQUEST['uemail'] == "" || $_REQUEST['upassword'] == "") {
		$msg = "<div class='alert alert-warning mt-2'>Please Fill Empty Fields</div>";
	}else {
		$uname = $_REQUEST['uname'];
		$uemail = $_REQUEST['uemail'];
		$upassword = $_REQUEST['upassword'];
		$sql = "INSERT INTO `login_tb`(`u_name`, `u_email`, `u_password`) VALUES ('$uname','$uemail','$upassword')";
		$result = mysqli_query($conn,$sql) or die("connection_aborted");
		if ($result == TRUE) {
			$msg = "<div class='alert alert-success mt-2'>Requester Added Successfully</div>";
		}else {
			$msg = "<div class='alert alert-danger mt-2'>Requester Failed to Add</div>";
		}
	}
}
?>


<div class="col-md-6 bg-secondary text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Add New Requester</h3>
</div>
  <form action="" method="POST" class="p-2">
     <div class="form-group">
      <label for=""><strong>Requester Name:</strong></label>
       <input type="text" class="form-control" name="uname">
     </div>
     <div class="form-group">
      <label for=""><strong>Requester Email :</strong></label>
       <input type="text" class="form-control" name="uemail">
     </div>
     <div class="form-group">
      <label for=""><strong>Requester Password :</strong></label>
       <input type="text" class="form-control" name="upassword">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="add" value="Submit">
       <a href="requester.php" type="submit" class="btn btn-danger text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
  </form>
</div>


<?php include"includes/footer.php";?>