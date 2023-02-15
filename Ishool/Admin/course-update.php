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

<!-- SELECT COURSE PHP CODE -->
<?php 
if (isset($_REQUEST["update-btn"])) {
$sql = "SELECT * FROM course_tb WHERE course_id = {$_REQUEST['update-id']}";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
$row = mysqli_fetch_assoc($result);

}
?>

<!-- UPDATE COURSE PHP CODE -->
<?php 
    
if (isset($_REQUEST["Update"]) && isset($_FILES['cimage'])) {

if ($_REQUEST["cname"] == "" || $_REQUEST["cdesc"] == ""
|| $_REQUEST["cauthor"] == "" || $_REQUEST["cduration"] == ""
|| $_REQUEST["cprice"] == ""|| $_REQUEST["coriginal"] == "") {
$msg = "<div class ='alert alert-warning mt-1'>Fill Empty Fields</div>";
}else{

$cid = $_REQUEST["cid"];
$cname = $_REQUEST["cname"];
$cdescription = $_REQUEST["cdesc"];
$cauthor = $_REQUEST["cauthor"];
$cduration = $_REQUEST["cduration"];
$cprice = $_REQUEST["cprice"];
$coriginal = $_REQUEST["coriginal"];

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

$update_query ="UPDATE `course_tb` SET `course_name`='$cname',`course_desc`='$cdescription',`course_author`='$cauthor',`course_img`='$path',`course_duration`='$cduration',`course_price`='$cprice',`course_original_price`='$coriginal' WHERE `course_id` = $cid";
$update_sql = mysqli_query($conn,$update_query) or die("connection_aborted");
if($update_sql == TRUE){
$msg = "<div class ='alert alert-success mt-1'>Updated Successfully</div>";
}else{
$msg = "<div class ='alert alert-success mt-1'>Failed to Update</div>";
}
}

}
 ?>

<div class="col-md-6 custom-color text-white m-2">
  <div>
   <h3 class="text-center mt-2 p-2">Update Course</h3>
  </div>
<form action="" method="POST" class="p-2" enctype="multipart/form-data">

    <div class="form-group my-2">
    <label for=""><strong> Course id :</strong></label>
    <input type="text" class="form-control" name="cid" value="<?php if(isset($row['course_id'])){echo $row['course_id'];}?>" readonly>
    </div>

    <div class="form-group my-2">
      <label for=""><strong> Course Name:</strong></label>
      <input type="text" class="form-control" name="cname" value="<?php if(isset($row['course_name'])){echo $row['course_name'];}?>">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Description :</strong></label>
      <input type="text" class="form-control" name="cdesc" value="<?php if(isset($row['course_desc'])){echo $row['course_desc'];}?>">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Author:</strong></label>
    <input type="text" class="form-control" name="cauthor" value="<?php if(isset($row['course_author'])){echo $row['course_author'];}?>">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Image :</strong></label>
      <input type="file" class="form-control" name="cimage"  value="<?php if(isset($row['course_img'])){echo $row['course_img'];}?>">
      <img src="<?php if(isset($row['course_img'])){echo $row['course_img'];}?>" alt="" class="img-fluid mt-1" style="width: 100px; height: 100px;">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Duration :</strong></label>
      <input type="text" class="form-control" name="cduration" value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];}?>">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Price :</strong></label>
      <input type="text" class="form-control" name="cprice" value="<?php if(isset($row['course_price'])){echo $row['course_price'];}?>">
    </div>

    <div class="form-group my-2">
      <label for=""><strong>Course Original Price :</strong></label>
      <input type="text" class="form-control" name="coriginal" value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];}?>">
    </div>

    <div class="form-group my-2">
      <input type="submit" class="btn btn-danger mr-2" name="Update" value="Update">
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