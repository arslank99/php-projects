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
		<div class="row mt-1">
			<div class="col-md-12 bg-dark text-white text-center py-1">
				<h3>Course List</h3>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-12">
				<a href="add-student.php" class="btn btn-primary my-2">Add New Student</a>
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th>Student Id</th>
							<th>Student Name</th>
							<th>Student Email</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM `student`";
						$result = mysqli_query($conn,$sql) or die("failed");
						if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $row['stu_id']; ?></td>
							<td><?php echo $row['stu_name']; ?></td>
							<td><?php echo $row['stu_email']; ?></td>
							<td>
					<!-- Update course button Form -->
					<form action="student-update.php" class="d-inline" method="POST">
					<input type="hidden" name="update-id" value="<?php echo $row['stu_id'];?>">
					<button class="btn btn-outline-primary me-2" name="update-btn">
						<i class="fa fa-pencil-alt"></i>
					</button>
					</form>
					<!-- Delete course button Form -->
					<form action="student-delete.php" class="d-inline" method="POST">
					<input type="hidden" name="id" value="<?php echo $row['stu_id']; ?>">
					<button class="btn btn-outline-secondary" name="delete-btn">
							<i class="fa fa-trash-restore-alt"></i>
					</button>
					</form>
						</td>
						</tr>
						<?php    }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<?php include"includes/footer.php";?>