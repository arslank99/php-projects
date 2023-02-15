<?php include'includes/header.php'; ?>
<!-- Checking Login email exists -->
<?php 
if (!isset($_SESSION)) {
session_start();
}
if (isset($_SESSION['is_login'])) {
 $stuemail = $_SESSION['loginemail'];
}else {
header("location: ../index.php");
}
?>

<!-- SELECTING DATA FROM TABLE -->
<?php 
$sql = "SELECT * FROM student WHERE stu_email = '{$stuemail}'";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
$row = mysqli_fetch_assoc($result);
 ?>

 <?php 

   if (isset($_REQUEST['stuupdate'])) {

   	  if ($_REQUEST['stuname'] == "" || $_REQUEST['stuoccu'] == "" ) {
   	  	$msg = "<small class='alert alert-danger'>Please Fill Empty Fields</small>";
   	  }else{
           $name =  $_REQUEST["stuname"];
           $stuocc =  $_REQUEST["stuoccu"];
           $studentemail =  $_REQUEST["stuemail"];
           $errors = array();
           $file_name = $_FILES['stuimg']['name'];
           $file_size = $_FILES['stuimg']['size'];
           $file_tmp  = $_FILES['stuimg']['tmp_name'];
           $file_type = $_FILES['stuimg']['type'];
           $file_ext  = explode('.',$file_name);
           $short = strtolower(end($file_ext));
           $path = "../images/upload/profile/".$file_name;
           $expensions = array("jpeg", "jpg", "png");
          if (in_array($short, $expensions) === false) {
              $errors = '<div class="alert alert-warning mt-2">extension not allowed, please choose a JPEG or PNG file.</div>';
              }
		   if ($file_size > 2097152) {
			$errors = '<div class="alert alert-info mt-2">File size must be excately 2 MB</div>';
			}
			if (empty($errors) == true) {
			move_uploaded_file($file_tmp,$path);
			$errors = '<div class="alert alert-success mt-2">image uploaded</div>';
			 } //else{
			// print_r($errors);
			// }
		   $sqlite = "UPDATE `student` SET `stu_name`='$name',`stu_occ`='$stuocc',`stu_img`='$path' WHERE `stu_email` = '$studentemail'";
			$update_query = mysqli_query($conn,$sqlite) or die("connection failed");
			if ($update_query == TRUE) {
			  $msg = "<small class='alert alert-success mb-2'>Profile Updated</small>";
			}else{
			  $msg = "<small class='alert alert-danger'>Profile Not Updated</small>";
			}
   	  }

   }


  ?>

<div class="col-md-7 me-2 mt-2">
	<form action="" method="POST" class="p-4 custom-color text-white" enctype="multipart/form-data">
		<h1 class="text-center">Student Profile Form</h1>
		<div class="form-group">
			<strong><label for="id">Student Id : </label></strong>
			<input type="text" name="stuid" class="form-control mt-1" value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];}?>" readonly>
		</div>
		<div class="form-group">
			<strong><label for="id">Student Email :</label></strong>
			<input type="email" name="stuemail" class="form-control mt-1" value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>" readonly>
		</div>
		<div class="form-group">
			<strong><label for="id">Student Name :</label></strong>
			<input type="text" name="stuname" class="form-control mt-1" value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];}?>">
		</div>
		<div class="form-group">
			<strong><label for="id">Student Occupation :</label></strong>
			<input type="text" name="stuoccu" class="form-control mt-1" value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}?>">
		</div>
		<div class="form-group">
			<strong><label for="id">Student Image :</label></strong>
			<input type="file" name="stuimg" class="form-control mt-1">
		</div>
		<div class="form-group mt-2">
			<input type="submit" name="stuupdate" value="Update" class="btn btn-outline-danger">
		</div><br>
		<?php if (isset($msg)) {echo $msg;} ?>
		<?php if (isset($errors)) {echo $errors;} ?>
		

	</form>
</div>


<?php include 'includes/footer.php'; ?>

 
