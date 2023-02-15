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
<?php 
  // Dashboard Course code
  $sql = "SELECT * FROM course_tb";
  $result = mysqli_query($conn,$sql) or die("connection_aborted");
  $row = mysqli_affected_rows($conn);


  // Dashboard Student code
  $sql_student = "SELECT * FROM student";
  $result_student = mysqli_query($conn,$sql_student) or die("connection_aborted");
  $row_student = mysqli_affected_rows($conn);

 ?>
<div class="container mt-4 text-center">
		<div class="row">
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-success">
					<h5 class="card-header text-white text-center">Course</h5>
					<div class="card-body">
						<p class="card-text">
							<h4 class="text-white text-center"><?php  print_r($row); ?></h4>
						</p>
					</div>
					<h5 class="text-center">
						<a href="requests.php" class="btn btn-success text-white">View</a>
					</h5>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-danger">
					<h5 class="card-header text-white text-center">Students</h5>
					<div class="card-body">
					<p class="card-text">
						<h4 class="text-white text-center"><?php  print_r($row_student); ?></h4>
					</p>
					</div>
					<h5 class="text-center">
						<a href="work-order.php" class="btn btn-danger text-white">View</a>
					</h5>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-primary">
					<h5 class="card-header text-white text-center">Sold</h5>
					<div class="card-body">
					<p class="card-text"><h4 class="text-white text-center">7</h4></p>
					</div>
					<h5 class="text-center">
						<a href="technician.php" class="btn btn-primary text-white">View</a>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-1"></div>
		<div class="col-sm-12 col-md-9">
			<h3 class="text-center text-white bg-dark p-2">Course Ordered</h3>
		</div>
	</div>
	<div class="row mt-1">
		<div class="col-md-1"></div>
		<div class="col-md-6 col-md-9">
			<table class="table table-hover table-bordered text-center">
				<thead>
				<tr>
					<th>Order id</th>
                    <th>Course id</th>
					<th>Student Email</th>
                    <th>Order Date</th>
                    <th>Amount</th>
                    <th>Action</th>
				 </tr>
				</thead>
				<tbody>
				<tr>
					<td>hhuuyt6564t</td>
					<td>2</td>
					<td>ali@gmail.com</td>
                    <td>23/8/2023</td>
                    <td>800</td>
                  <td>
                     <a href=""class="btn btn-outline-secondary">
                     <i class="fa fa-trash-restore-alt"></i>
                     </a>
                  </td>
			</tr>
				</tbody>
			</table>
		</div>
	</div> 
</div>



<?php include"includes/footer.php";?>