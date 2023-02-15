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

<div class="col-md-8">
<?php 

if (isset($_REQUEST['view'])) {
	 $sql = "SELECT * FROM assign_work WHERE request_id = {$_REQUEST['id']}";
     $result = mysqli_query($conn, $sql) or die("connection_aborted");
     if ($result == TRUE) {
     $row1 = mysqli_fetch_assoc($result);
 ?>
 <div class="container mt-3 text-center">
	<h2 class="mb-4"><strong>Assign Work Details</strong></h2>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>Request iD</td>
				<td><?php if (isset($row1['request_id'])){echo $row1['request_id'];}?></td>
			</tr>
			<tr>
				<td>Information</td>
				<td><?php if (isset($row1['request_info'])){echo $row1['request_info'];}?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php if (isset($row1['request_desc'])){echo $row1['request_desc'];}?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php if (isset($row1['request_name'])){echo $row1['request_name'];}?></td>
			</tr>
			<tr>
				<td>Address1</td>
				<td><?php if (isset($row1['request_address1'])){echo $row1['request_address1']; }?></td>
			</tr>
			<tr>
				<td>Address2</td>
				<td><?php if (isset($row1['request_address2'])){echo $row1['request_address2']; }?></td>
			</tr>
			<tr>
				<td>State</td>
				<td><?php if (isset($row1['request_state'])){echo $row1['request_state']; }?></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td><?php if (isset($row1['request_zip'])){echo $row1['request_zip']; }?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php if (isset($row1['request_email'])){echo $row1['request_email']; }?></td>
			</tr>
			<tr>
				<td>Moible</td>
				<td><?php if (isset($row1['request_mobile'])){echo $row1['request_mobile'];}?></td>
			</tr>
			<tr>
				<td>Assign</td>
				<td>
					<?php if (isset($row1['assign_technician'])){echo $row1['assign_technician']; }?>
					
				</td>
			</tr>
			<tr>
				<td>Date</td>
				<td><?php if (isset($row1['assign_date'])){echo $row1['assign_date'];}?></td>
			</tr>
		</tbody>
	</table>
	<form class='d-print-none d-inline mr-2'>
		<input class='btn btn-danger' type='submit' value='print' onClick ='window.print()'>
	</form>
	<form action="work-order.php" class='d-print-none d-inline'>
		<input class='btn btn-secondary' type='submit' value='close'>
	</form>
</div>

 <?php   
}else{
     	echo '0 Result Found';
     }

}

?>
</div>


<?php include"includes/footer.php";?>