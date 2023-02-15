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

<div class="col-md-10">

<div class="container">

<div class="row p-2 mt-2 bg-dark text-white text-center">
	<div class="col-md-12"><h3>Lesson List</h3></div>
</div>

<div class="row mt-2">
	<div class="col-md-6">
		<form action="" method="POST">
			<div class="form-group">
				<label for="checkid"><strong>Enter Course Id :</strong></label>
				<input type="text" class="form-control mt-1" placeholder="Search" name="checkid">
				<input type="submit" class="mt-2 btn btn-outline-primary px-5" value="Search"
				name="searchbtn">
			</div>
		</form>
	</div>
</div>

</div>

<div class="row p-3 mt-2">
<div class="col-md-12">
<?php  
$sql = "SELECT course_id FROM course_tb";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
while ($row = mysqli_fetch_assoc($result)) {

if (isset($_REQUEST["checkid"]) && $_REQUEST["checkid"] == $row['course_id']){

 $sqlite = "SELECT * FROM course_tb WHERE course_id = {$_REQUEST["checkid"]}";
 $lessresult = mysqli_query($conn,$sqlite) or die("connection_aborted");
 $row2 = mysqli_fetch_assoc($lessresult);
  $_SESSION["course_id"] = $row2["course_id"];
  $_SESSION["course_name"] = $row2["course_name"]; 
?>

<a href="add-lesson.php" class="btn btn-primary">Add New Lesson</a>
<h3 class="mt-2 bg-dark text-white p-2">
	Course id : <?php if(isset($row2["course_id"])) {echo $row2["course_id"];}?>
	Course name : <?php if(isset($row2["course_name"])) {echo $row2["course_name"];}?>
</h3>

<table class="table table-bordered table-hover text-center">
	<thead>
		<tr>
			<th>Lesson Id </th>
			<th>Lesson Name </th>
			<th>Lesson Video</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php 
   $sqllesson = "SELECT * FROM `lesson_tb` WHERE course_id = {$_REQUEST['checkid']}";
   $lessonresult = mysqli_query($conn,$sqllesson) or die("connection_aborted");
        if (mysqli_num_rows($lessonresult) > 0) {
        while ($row = mysqli_fetch_assoc($lessonresult)){
     ?>
		<tr>
			<td><?php echo $row["lesson_id"];?></td>
			<td><?php echo $row["lesson_name"];?></td>
			<td><?php echo $row["lesson_link"];?></td>
			<td>
		<form action="lesson-update.php" method="POST" class="d-inline">
		<input type="hidden" name="updateid" value="<?php echo $row['lesson_id'];?>">
		<button class="btn btn-outline-primary" name="update-btn">
			<i class="fa fa-pencil-alt"></i>
		</button>	
		</form>
		<form action="lesson-delete.php" method="POST" class="d-inline">
		<input type="hidden" name="deleteid" value="<?php echo $row['lesson_id'];?>">
		<button class="btn btn-outline-secondary" name="delete-btn">
			<i class="fa fa-trash-restore-alt"></i>
		</button>	
		</form>
			</td>
		</tr>
		<?php
		 	}
        }
        ?>
	</tbody>
</table>

<?php 
}
}
?>

</div>
</div>
</div>
</div>



<?php include"includes/footer.php";?>

