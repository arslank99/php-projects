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


<!-- php Add new lesson -->
<?php 

if (isset($_REQUEST['lessonbtn']) && isset($_FILES['leslink'])) {

if ($_REQUEST['csid'] == "" || $_REQUEST['csname'] == ""
|| $_REQUEST['lesname'] == "" || $_REQUEST['lesdescription'] == ""){

     $msg = "<div class='alert alert-danger mt-2 w-50'>Fill The Empty Fields !</div>";

}else{
    $courseid = $_REQUEST['csid'];
    $coursename = $_REQUEST['csname'];
    $lessonname = $_REQUEST['lesname'];
    $lesdescription = $_REQUEST['lesdescription'];
    $lessonlink = $_FILES['leslink']['name'];
    $lessontmp = $_FILES['leslink']['tmp_name'];
    $file_ext  = explode('.',$lessonlink);
    $short = strtolower(end($file_ext));
    $linkfolder = "../video/upload/".$lessonlink;
    move_uploaded_file($lessontmp, $linkfolder);

   $sql = "INSERT INTO `lesson_tb`(`lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES ('$lessonname','$lesdescription','$linkfolder','$courseid','$coursename')";
    $result = mysqli_query($conn,$sql) or die("connection_aborted");
    if ($result == TRUE) {
    	$msg = "<div class='alert alert-success w-50 mt-2'>Lesson Added Successfully<div>";
    }else{
    	$msg = "<div class='alert alert-success w-50'>Lesson Not Added<div>";
    }

}

 }
      
 ?>
<!-- php Add new lesson -->

<div class="col-md-10 my-2">
	<div class="container">
		<div class="row">
			<div class="col-md-8 custom-color p-2">
				<h2 class="text-center text-white">Add New Lesson</h2>
				<form action="" method="POST" class="p-2 text-white" enctype="multipart/form-data">
					<div class="form-group">
					<strong><label for="">Course Id :</label></strong>
					<input type="text" name="csid" class="form-control mt-1" 
					value="<?php if($_SESSION['course_id']){echo$_SESSION['course_id'];} ?>">
					</div>
					<div class="form-group">
						<strong><label for="">Course Name :</label></strong>
						<input type="text" name="csname" class="form-control mt-1" value="<?php if($_SESSION['course_name']){echo$_SESSION['course_name'];} ?>">
					</div>
					<div class="form-group">
						<strong><label for="">Lesson Name :</label></strong>
						<input type="text" name="lesname" class="form-control mt-1">
					</div>
					<div class="form-group">
						<strong><label for="">Lesson Description :</label></strong>
						<textarea name="lesdescription" id="description" cols="30" rows="5" class="form-control mt-1">
						</textarea>
					</div>
				<div class="form-group">
					<strong><label for="">Lesson Link :</label></strong>
					<input type="file" name="leslink" class="form-control mt-1">
				</div>
				<div class="form-group mt-2">
					<input type="submit" name="lessonbtn" value="submit" class="btn btn-danger">
					<a href="lessons.php" class="btn btn-secondary">close</a>
				</div>
				 <?php if (isset($msg)) {echo $msg;} ?>
				</form>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
</div>

<?php include"includes/footer.php";?>