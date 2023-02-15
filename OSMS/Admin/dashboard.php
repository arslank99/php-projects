<?php
include"includes/header.php"; 
include "../database.php";
session_start();
if ($_SESSION['is_adminlogin']) {
 $aEmail = $_SESSION['aEmail'];
}else {
  header("location: adminlogin.php");
}


// this is request recived code
$req_recived = "SELECT * FROM `submit_request`";
$req_query = mysqli_query($conn,$req_recived) or die("connection_aborted");
$req_row = mysqli_fetch_assoc($req_query);




// this is assingn work code
$work_recived = "SELECT * FROM `assign_work`";
$work_query = mysqli_query($conn,$work_recived) or die("connection_aborted");
$work_row = mysqli_affected_rows($conn);


// this is assingn work code
$tech_no = "SELECT * FROM `assign_work`";
$tech_query = mysqli_query($conn,$tech_no) or die("connection_aborted");
$tech_row = mysqli_affected_rows($conn);

?>

<div class="col-md-10">
	<div class="container mt-4 text-center">
		<div class="row">
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-success">
					<h5 class="card-header text-white text-center">Requests Recieved</h5>
					<div class="card-body">
						<p class="card-text">
							<h4 class="text-white text-center"><?php echo $req_row['s_id'];?></h4>
						</p>
					</div>
					<h5 class="text-center">
						<a href="requests.php" class="btn btn-success text-white">View</a>
					</h5>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-danger">
					<h5 class="card-header text-white text-center">Assign Work</h5>
					<div class="card-body">
					<p class="card-text"><h4 class="text-white text-center"><?php echo $work_row;?></h4></p>
					</div>
					<h5 class="text-center">
						<a href="work-order.php" class="btn btn-danger text-white">View</a>
					</h5>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 mb-2">
				<div class="card bg-info">
					<h5 class="card-header text-white text-center">No.of Technician</h5>
					<div class="card-body">
					<p class="card-text"><h4 class="text-white text-center"><?php echo $tech_row;?></h4></p>
					</div>
					<h5 class="text-center">
						<a href="technician.php" class="btn btn-info text-white">View</a>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-1"></div>
		<div class="col-sm-12 col-md-9">
			<h3 class="text-center text-white bg-dark p-1">List of Requests</h3>
		</div>
	</div>
	<div class="row mt-1">
		<div class="col-md-1"></div>
		<div class="col-md-6 col-md-9">
			<?php 

                  $sqlite = "SELECT * FROM `login_tb`";
                  $result = mysqli_query($conn,$sqlite) or die("connection_aborted");
                  if (mysqli_num_rows($result) > 0) {
                     	
			 ?>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
					<th>Requester id</th>
					<th>Name</th>
					<th>Email</th>
				    </tr>
				</thead>
				<tbody>
					<?php 
                        while ($row = mysqli_fetch_assoc($result)) {
					 ?>
					<tr>
						<td><?php echo $row['u_id']; ?></td>
						<td><?php echo $row['u_name']; ?></td>
						<td><?php echo $row['u_email']; ?></td>
					</tr>
					                 
                 <?php
                    } 
                 }else {
                 	echo 'No Result Found';
                 }
               ?> 	
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include"includes/footer.php"; ?>