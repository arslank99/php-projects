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

<div class="col-sm-12 col-md-9">
	<h1 class="text-center my-2">Work Order</h1>
	<?php
	$sql = "SELECT * FROM assign_work";
	$result = mysqli_query($conn, $sql) or die("connection_aborted");
	if (mysqli_num_rows($result) > 0) { ?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Request Id</th>
				<th>Request Info</th>
				<th>Name</th>
				<th>Address1</th>
				<th>Address2</th>
				<th>City</th>
				<th>Mobile</th>
				<th>Technician</th>
				<th>Date</th>
				<th>View</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row['request_id'];?></td>
				<td><?php echo $row['request_info'];?></td>
				<td><?php echo $row['request_name'];?></td>
				<td><?php echo $row['request_address1'];?></td>
				<td><?php echo $row['request_address2'];?></td>
				<td><?php echo $row['request_city'];?></td>
				<td><?php echo $row['request_mobile'];?></td>
				<td><?php echo $row['assign_technician'];?></td>
				<td><?php echo $row['assign_date'];?></td>
				<td>
					<form action="assign-work.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $row['request_id'];?>">
						<button class="bg-warning p-1" name="view" value="view" type="submit">
						<i class="fas fa-solid fa-eye"></i>
						</button>
					</form>
				</td>
				<td>
					<form action="" method="POST" class="">
						<input type="hidden" name="id" value="<?php echo $row['request_id'];?>">
						<button class="bg-secondary text-white p-1" name="delete" value="delete" type="submit">
						<i class="fas fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
			<?php
			}
			}else {
			echo '0 Result Found';
			}
			?>


<?php
if (isset($_REQUEST['delete'])) {
$sql = "DELETE FROM assign_work WHERE request_id = {$_REQUEST['id']}";
$result = mysqli_query($conn, $sql) or die("connection_aborted");
if ($result == TRUE) {
echo '<meta http-equiv="refresh" content="0;URL=?closed">';
}else {
	echo 'Unable to Delete';
}
}
?>
 
     </tbody>
	</table>
</div>

<?php include"includes/footer.php";?>