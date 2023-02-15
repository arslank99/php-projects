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

 if (isset($_POST['add'])) {
  // check fields
  if ($_POST['sname'] == "" || $_POST['semail'] == "" || $_POST['spassword'] == "" 
  	 || $_POST['occupation'] == "") {
    $msg = '<div class="alert alert-warning mt-2">Fill The Empty Fields.</div>';
  } else {

    $sname = $_POST["sname"];
    $spassword = $_POST["spassword"];
    $semail = $_POST["semail"];
    $occupation = $_POST["occupation"];

$sql = "INSERT INTO `student`(`stu_name`,`stu_email`,`stu_password`,`stu_occ`,`stu_img`) VALUES ('$sname','$semail','$spassword','$occupation',NULL)";
$result = mysqli_query($conn,$sql) or die("failed");
if($result == TRUE){
$msg = '<div class="alert alert-success mt-2">student added successfully.</div>';
}else{
$msg = '<div class="alert alert-danger mt-2">student not added.</div>';
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
      <label for=""><strong> Student Name:</strong></label>
       <input type="text" class="form-control" name="sname">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Email:</strong></label>
       <input type="email" class="form-control" name="semail">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Password:</strong></label>
       <input type="text" class="form-control" name="spassword">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Student Occupation:</strong></label>
       <input type="text" class="form-control" name="occupation">
     </div>
     <div class="form-group my-2">
       <input type="submit" class="btn btn-danger mr-2" name="add" value="Submit">
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