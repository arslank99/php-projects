<?php
include"includes/header.php"; 
include "../database.php";
session_start();
if ($_SESSION['is_adminlogin']) {
 $aEmail = $_SESSION['aEmail'];
}else {
  header("location: adminlogin.php");
}
?>
<div class="col-md-10">
	<div class="container">
		<div class="row p-2 mt-2 bg-dark text-white text-center">
			<div class="col-md-12">
				<h3>Work Report</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mt-3">
				<form action="" method="POST" class="form-inline" >
					<div class="form-group">
						<div class="row">
							<div class="col">
								<input type="date" class="form-control" name="startdate">
							</div>
								<strong><label> to :</label></strong>
							<div class="col">
								<input type="date" class="form-control" name="enddate">
							</div>
							<div class="col">
						       <input type="submit" name="workbtn" class="btn btn-danger text-white" value="Search">
					        </div>
						</div>
					</div>
				</form>
				<?php 
                 if (isset($_REQUEST['workbtn'])) {

                  $startdate = $_REQUEST['startdate'];
                  $endtdate = $_REQUEST['enddate'];
                  $sql = "SELECT * FROM `assign_work` WHERE `assign_date` BETWEEN ' $startdate' AND ' $endtdate'";
                  $result = mysqli_query($conn,$sql) or die('connection_aborted');
                  if (mysqli_num_rows($result) > 0 ) {
                       	    	   
				 ?>
			</div>
		</div>
		<div class="row mt-2 text-center">
			<div class="col-md-12">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Request id</th>
							<th>Request Info</th>
							<th>Request Name</th>
							<th>Request Address1</th>
							<th>Request City</th>
							<th>Request Mobile</th>
							<th>Technician</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						 <?php while ($row = mysqli_fetch_assoc($result)) { ?> 	
						<tr>
							<td> <?php echo $row['request_id']; ?></td>
							<td> <?php echo $row['request_info']; ?></td>
							<td> <?php echo $row['request_name']; ?></td>
							<td> <?php echo $row['request_address1']; ?></td>
							<td> <?php echo $row['request_city']; ?></td>
							<td> <?php echo $row['request_mobile']; ?></td>
							<td> <?php echo $row['assign_technician']; ?></td>
							<td> <?php echo $row['assign_date']; ?></td>
						</tr>
						<?php 
					} 
				}else {
					echo '<div class="alert alert-info mt-1">
						No Result Found
					</div>';
				}  
			}
                 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include"includes/footer.php";?>