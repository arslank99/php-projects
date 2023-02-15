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

if (isset($_REQUEST["edit"])) {
  $sql = "SELECT * FROM technician_tb WHERE tech_id = {$_REQUEST['id']}";
  $result = mysqli_query($conn,$sql) or die("connection_aborted");
  if ($result == TRUE) {
    $row = mysqli_fetch_assoc($result);
  }else {
    echo 'error';
  }
}
 ?>


<?php
if (isset($_REQUEST['update'])) {
if (($_REQUEST['tid'] == "" )|| ($_REQUEST['tname'] == "") || ($_REQUEST['temail']) == "" || (      $_REQUEST['tcity'] == "" || ($_REQUEST['tmobile']) == "")) {
$msg = "<div class='alert alert-warning mt-2'>Fill Empty Fields First</div>";
}else {

$tid = $_REQUEST['tid'];
$tname = $_REQUEST['tname'];
$temail = $_REQUEST['temail'];
$tcity = $_REQUEST['tcity'];
$tmobile = $_REQUEST['tmobile'];

$sqlite = "UPDATE `technician_tb` SET `tech_name`='$tname',`tech_email`='$temail',`tech_city`='$tcity',`tech_mobile`='$tmobile' WHERE tech_id = '$tid'";
$conclusion = mysqli_query($conn,$sqlite) or die('connection_aborted');
if ($conclusion == TRUE) {
$msg = "<div class='alert alert-success mt-2'>Successfully Updated</div>";
}else {
$msg = "<div class='alert alert-danger mt-2'>Unable to Update</div>";
}
}
}
?>


<div class="col-md-8 bg-secondary text-white m-2">
  <div>
    <h3 class="text-center mt-2 p-2">Update technician</h3>
  </div>
  <form action="" method="POST" class="p-2">
     <div class="form-group">
      <label for=""><strong>technician Id :</strong></label>
       <input type="text" class="form-control" name="tid" value="<?php if(isset($row['tech_id'])) {echo $row['tech_id'];}?>" readonly>
     </div>
     <div class="form-group">
      <label for=""><strong>technician Name:</strong></label>
       <input type="text" class="form-control" name="tname" value="<?php if(isset($row['tech_name'])){echo $row['tech_name'];}?>">
     </div>
     <div class="form-group">
      <label for=""><strong>technician Email :</strong></label>
       <input type="text" class="form-control" name="temail" value="<?php if(isset($row['tech_email'])){echo $row['tech_email'];}?>">
     </div>
     <div class="form-group">
      <label for=""><strong>technician City :</strong></label>
       <input type="text" class="form-control" name="tcity" value="<?php if(isset($row['tech_city'])) {echo $row['tech_city'];}?>">
     </div>
      <div class="form-group">
      <label for=""><strong>technician Mobile :</strong></label>
       <input type="text" class="form-control" name="tmobile" value="<?php if(isset($row['tech_mobile'])) {echo $row['tech_mobile'];}?>">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="update" value="Update">
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