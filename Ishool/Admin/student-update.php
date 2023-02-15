<?php
  include"includes/header.php";
  if(!isset($_SESSION)){
    session_start();
 }
 if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_login'];
 } else{
    header("location: ../index.php");
 }
?>


<?php 
if (isset($_REQUEST["update-btn"])) {
$select = "SELECT * FROM `student` WHERE stu_id = {$_REQUEST['update-id']}";
$query = mysqli_query($conn,$select) or die("connection_aborted");
$row = mysqli_fetch_assoc($query);
}

?>

<?php

if (isset($_POST['update-student'])) {
// check fields
if ($_POST['sname'] == "" || $_POST['semail'] == "" || $_POST['spassword'] == ""
|| $_POST['occupation'] == "") {
$msg = '<div class="alert alert-warning mt-2">Fill The Empty Fields.</div>';
} else {

$sid  = $_POST['sid'];
$sname = $_POST["sname"];
$spassword = $_POST["spassword"];
$semail = $_POST["semail"];
$occupation = $_POST["occupation"]; 

  $sql = "UPDATE `student` SET `stu_name`='$sname',`stu_email`='$semail',`stu_password`='$spassword',`stu_occ`='$occupation' WHERE stu_id = {$sid}";

$result = mysqli_query($conn,$sql) or die("failed");
if($result == TRUE){
$msg = '<div class="alert alert-success mt-2">student Updated successfully.</div>';
}else{
$msg = '<div class="alert alert-danger mt-2">student not Updated.</div>';
}
}
}

?>



<div class="col-md-6 custom-color text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Add New student</h3>
</div>
  <form action="" method="POST" class="p-2" enctype="multipart/form-data">
     <div class="form-group my-2">
      <label for=""><strong> Student Id:</strong></label>
       <input type="text" class="form-control" name="sid" value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];}?>" readonly>
     </div>
     <div class="form-group my-2">
      <label for=""><strong> Student Name:</strong></label>
       <input type="text" class="form-control" name="sname" value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];}?>">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Email:</strong></label>
       <input type="email" class="form-control" name="semail" value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Password:</strong></label>
       <input type="text" class="form-control" name="spassword" value="<?php if(isset($row['stu_password'])){echo $row['stu_password'];}?>">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Occupation:</strong></label>
       <input type="text" class="form-control" name="occupation" value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}?>">
     </div>
     <div class="form-group my-2">
       <input type="submit" class="btn btn-danger mr-2" name="update-student" value="Submit">
       <a href="students.php" type="submit" class="btn btn-secondary text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;}?>
  </form>
</div>
			</div>
		</div>
	</div>
</div>
<?php include"includes/footer.php";?>