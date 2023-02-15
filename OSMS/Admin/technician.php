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

<div class="col-md-9">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h1 class="text-center my-3">All Technician Data Here</h1>
<?php
$sql = "SELECT * FROM Technician_tb";
$result = mysqli_query($conn,$sql) or die("connection failed");
if(mysqli_num_rows($result) > 0 ){ ?>
<div class="my-2">
	<a href="technician-add.php" class="btn btn-danger text-white">Add New Technician</a>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Technician id</th>
			<th>Technician Name</th>
			<th>Technician Email</th>
			<th>Technician City</th>
			<th>Technician Mobile</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  while($row = mysqli_fetch_assoc($result)){  ?>
		<tr>
			<td><?php echo $row["tech_id"];?></td>
			<td><?php echo $row["tech_name"];?></td>
			<td><?php echo $row["tech_email"];?></td>
			<td><?php echo $row["tech_city"];?></td>
			<td><?php echo $row["tech_mobile"];?></td>
			<td>
				<form action="technician-update.php" method="post" class="d-inline">
					<input type="hidden" name="id" value="<?php echo $row['tech_id'];?>">
					<button class="btn btn-info" name="edit"><i class="fa fa-pencil-alt"></i></button>
				</form>
				<form action="" method="post" class="d-inline">
					<input type="hidden" name="delete" value="<?php echo $row['tech_id'];?>">
					<button class="btn btn-secondary"><i class="fa fa-trash"></i></button>
				</form>
			</td>
		</tr>
		<?php
		}
		}else {
			echo '<div class="text-center text-info"><h3>0 Result Found</h3></div>';
		}
		?>
		<?php
		if (isset($_REQUEST['delete'])) {
		$delete = "DELETE FROM Technician_tb WHERE Tech_id = {$_REQUEST['delete']}";
		$deletequery = mysqli_query($conn,$delete) or die("connection_aborted");
		if ($deletequery == TRUE) {
		echo '<meta http-equiv="refresh" content="0;URL=?closed">';
		}else {
		echo 'Not Deleted';
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