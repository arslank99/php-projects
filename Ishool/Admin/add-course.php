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

 if (isset($_POST['add']) && isset($_FILES['cimage'])) {
  // check fields
  if ($_POST['cname'] == "" || $_POST['cdesc'] == "" || $_POST['cauthor'] == "" || $_POST['cduration'] == "" || $_POST['cprice'] == "" || $_POST['coriginal'] == "") {
    $msg = '<div class="alert alert-warning mt-2">Fill The Empty Fields.</div>';
  } else {

    $name = $_POST["cname"];
    $description = $_POST["cdesc"];
    $author = $_POST["cauthor"];
    $duration = $_POST["cduration"];
    $price = $_POST['cprice'];
    $original = $_POST['coriginal'];

    $errors = array();
    $file_name = $_FILES['cimage']['name'];
    $file_size = $_FILES['cimage']['size'];
    $file_tmp  = $_FILES['cimage']['tmp_name'];
    $file_type = $_FILES['cimage']['type'];
    $file_ext  = explode('.',$file_name);
    $short = strtolower(end($file_ext));
    $path = "../images/upload/".$file_name;

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
    //print_r($errors);
    //} 

    $sql = "INSERT INTO `course_tb`(`course_name`,`course_desc`, `course_author`,`course_img`,`course_duration`,`course_price`,`course_original_price`) VALUES ('$name','$description','$author','$path','$duration','$price','$original')";
   
    $result = mysqli_query($conn,$sql) or die("failed");
    if($result == TRUE){
      $msg = '<div class="alert alert-success mt-2">course added successfully.</div>';
    }else{
      $msg = '<div class="alert alert-danger mt-2">course not submitted.</div>';
      }


  }
}
?>

<div class="col-md-6 custom-color text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Add New Course</h3>
</div>
  <form action="" method="POST" class="p-2" enctype="multipart/form-data">
     <div class="form-group my-2">
      <label for=""><strong> Course Name:</strong></label>
       <input type="text" class="form-control" name="cname">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Description :</strong></label>
       <input type="text" class="form-control" name="cdesc">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Author:</strong></label>
       <input type="text" class="form-control" name="cauthor">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Image :</strong></label>
       <input type="file" class="form-control" name="cimage">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Duration :</strong></label>
       <input type="text" class="form-control" name="cduration">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Price :</strong></label>
       <input type="text" class="form-control" name="cprice">
     </div>
     <div class="form-group my-2">
      <label for=""><strong>Course Original Price :</strong></label>
       <input type="text" class="form-control" name="coriginal">
     </div>
     <div class="form-group my-2">
       <input type="submit" class="btn btn-danger mr-2" name="add" value="Submit">
       <a href="courses.php" type="submit" class="btn btn-secondary text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
     <?php if (isset($errors)) {echo $errors;} ?>
  </form>
</div>
			</div>
		</div>
	</div>
</div>
<?php include"includes/footer.php";?>