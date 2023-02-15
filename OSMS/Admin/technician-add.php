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

<div class="col-md-9">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
<?php
if (isset($_REQUEST['add'])) {
	if($_REQUEST['tname'] == "" || $_REQUEST['temail'] == "" || $_REQUEST['tmobile'] == "" || $_REQUEST['tcity'] == "") {
		$msg = "<div class='alert alert-warning mt-2'>Please Fill Empty Fields</div>";
	}else {
		$tname = $_REQUEST['tname'];
		$temail = $_REQUEST['temail'];
		$tcity  = $_REQUEST['tcity'];
		$tmobile = $_REQUEST['tmobile'];
		$sql = "INSERT INTO `technician_tb`(`tech_name`,`tech_email`,`tech_city`,`tech_mobile`) VALUES ('$tname','$temail','$tcity','$tmobile')";
		$result = mysqli_query($conn,$sql) or die("connection_aborted");
		if ($result == TRUE) {
			$msg = "<div class='alert alert-success mt-2'>technician Added Successfully</div>";
		}else {
			$msg = "<div class='alert alert-danger mt-2'>technician Failed to Add</div>";
		}
	}
}
?>


<div class="col-md-8 bg-secondary text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Add New technician</h3>
</div>
  <form action="" method="POST" class="p-2">
     <div class="form-group">
      <label for=""><strong>technician Name:</strong></label>
       <input type="text" class="form-control" name="tname">
     </div>
     <div class="form-group">
      <label for=""><strong>technician Email :</strong></label>
       <input type="text" class="form-control" name="temail">
     </div>
     <div class="form-group">
      <label for=""><strong>technician City:</strong></label>
       <input type="text" class="form-control" name="tcity">
     </div>
     <div class="form-group">
      <label for=""><strong>technician Mobile :</strong></label>
       <input type="text" class="form-control" name="tmobile">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="add" value="Submit">
       <a href="technician.php" type="submit" class="btn btn-danger text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
  </form>
</div>
			</div>
		</div>
	</div>
</div>

<?php include"includes/footer.php";?>