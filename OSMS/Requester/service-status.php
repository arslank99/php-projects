<?php 
include"includes/header.php"; 
include"../database.php";
session_start();
if($_SESSION['is_login']) {
     $email = $_SESSION['email'];
}else {
	header("location:requester-login.php");
}
?>


<div class="col-md-6">
	<form action="" method="POST" class="form-inline mt-3 d-print-none">
		<label for="checkid" class="mr-2"><strong>Enter Request Id :</strong></label>
		<input type="text" class="form-control mr-2" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
		<input type="submit" class="btn btn-danger" name="search" value="search">	
	</form>

<?php 
if (isset($_REQUEST['checkid'])) {
if($_REQUEST['checkid'] == "") {
$msg = "<div class='alert alert-warning w-25'>fill the Input field</div>";
}else{
$sql = "SELECT * FROM assign_work WHERE request_id = {$_REQUEST['checkid']}";
$result = mysqli_query($conn,$sql) or die("Connection Query Failed");
$row = mysqli_fetch_assoc($result);
if(($row['request_id'] == $_REQUEST['checkid'])) { 
?>
<div class="container mt-3 text-center">
	<h3><strong>Assign Work Details</strong></h3>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>Request iD</td>
				<td><?php if (isset($row['request_id'])){echo $row['request_id'];}?></td>
			</tr>
			<tr>
				<td>Information</td>
				<td><?php if (isset($row['request_info'])){echo $row['request_info'];}?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php if (isset($row['request_desc'])){echo $row['request_desc'];}?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php if (isset($row['request_name'])){echo $row['request_name'];}?></td>
			</tr>
			<tr>
				<td>Address1</td>
				<td><?php if (isset($row['request_address1'])){echo $row['request_address1']; }?></td>
			</tr>
			<tr>
				<td>Address2</td>
				<td><?php if (isset($row['request_address2'])){echo $row['request_address2']; }?></td>
			</tr>
			<tr>
				<td>State</td>
				<td><?php if (isset($row['request_state'])){echo $row['request_state']; }?></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td><?php if (isset($row['request_zip'])){echo $row['request_zip']; }?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php if (isset($row['request_email'])){echo $row['request_email']; }?></td>
			</tr>
			<tr>
				<td>Moible</td>
				<td><?php if (isset($row['request_mobile'])){echo $row['request_mobile'];}?></td>
			</tr>
			<tr>
				<td>Assign</td>
				<td>
					<?php if (isset($row['assign_technician'])){echo $row['assign_technician']; }?>
					
				</td>
			</tr>
			<tr>
				<td>Date</td>
				<td><?php if (isset($row['assign_date'])){echo $row['assign_date'];}?></td>
			</tr>
			<tr>
				<td>Customer Signature</td>
				<td></td>
			</tr>
			<tr>
				<td>Technician Signature</td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<form class='d-print-none'>
		<input class='btn btn-danger' type='submit' value='print' onClick ='window.print()'>
	</form>
</div>
     
<?php
}else{
echo "<div class='alert alert-info w-50'>Your Request is Still Pending</div>";
}
}
}
?>
<?php if(isset($msg)){echo $msg;} ?>
</div>





<script>
	function isInputNumber(evt){
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>
<?php include"includes/footer.php"; ?>
