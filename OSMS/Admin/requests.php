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

<?php 

$sql = "SELECT * FROM `submit_request` LIMIT 3";
$result = mysqli_query($conn,$sql) or die("connection_aborted");
if (mysqli_num_rows($result) > 0 ) {
 
?>
<div class="col-md-10">
<div class="container mt-1">
<div class="row">
<!-- this is form card -->

<div class="col-sm-12 col-md-4">
	<?php while ($row = mysqli_fetch_assoc($result)) {?>
	<div class="card my-4">
		<div class="card-header"><h5>Request ID : <?php echo $row['s_id'];?></h5></div>
		<div class="card-body">
			<h5>Request Information : <?php echo $row['s_information']; ?></h5>
			<p>Request Description : <?php echo $row['s_description']; ?></p>
			<p>Request Date : <?php echo $row['s_date']; ?></p>
			<form action="" method="POST" class="float-right">
				<input type="hidden" name="id" value="<?php echo $row['s_id'];?>">
				<input type="submit" name="view" value="View" class="btn btn-danger">
				<input type="submit" name="close" value="Close" class="btn btn-secondary">
			</form>
		</div>
	</div>
	<?php 

      }  
  } 
	?>

</div>
<div class="col-md-1"></div>
<!-- this is form front side -->
<?php 
    //view page post request show
    if (isset($_REQUEST['view'])) {
    $sqlite = "SELECT * FROM `submit_request` WHERE s_id = {$_REQUEST['id']}";
    $result1 = mysqli_query($conn,$sqlite) or die('connection_aborted');
    $row2 = mysqli_fetch_assoc($result1);
    }

    //request data insert view button query
    if (isset($_REQUEST['submit'])) {
    	if ( $_REQUEST['requestid'] == ""   || $_REQUEST['requestinfo'] == "" ||
    	     $_REQUEST['requestdesc'] == "" || $_REQUEST['requestname'] == "" || 
    	     $_REQUEST['requestaddress1'] == "" || $_REQUEST['requestaddress2'] == "" ||
    	     $_REQUEST['requestcity'] == "" || $_REQUEST['requeststate'] == "" || 
    	     $_REQUEST['requestzip'] == ""  || $_REQUEST['requestemail'] == "" || 
    	     $_REQUEST['requestmobile'] == "" || $_REQUEST['technician'] == "" || 
    	     $_REQUEST['date'] == "") {
    		 $msg = "<div class='alert alert-warning mt-2'>Please Fill Input Fields!</div>";
    		
    	}else {
    		$requestid = $_REQUEST['requestid'];
    		$requestinfo = $_REQUEST['requestinfo'];
    		$requestdesc = $_REQUEST['requestdesc'];
    		$requestname = $_REQUEST['requestname'];
    		$requestaddress1 = $_REQUEST['requestaddress1'];
    		$requestaddress2 = $_REQUEST['requestaddress2'];
    		$requestcity = $_REQUEST['requestcity'];
    		$requeststate = $_REQUEST['requeststate'];
    		$requestzip = $_REQUEST['requestzip'];
    		$requestemail = $_REQUEST['requestemail'];
    		$requestmobile = $_REQUEST['requestmobile'];
    		$technician = $_REQUEST['technician'];
    		$date = $_REQUEST['date'];

    		$sqlinsert = "INSERT INTO `assign_work`(`request_id`, `request_info`, `request_desc`, `request_name`, `request_address1`, `request_address2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `assign_technician`, `assign_date`) VALUES ('$requestid','$requestinfo','$requestdesc','$requestname ','$requestaddress1','$requestaddress2','$requestcity','$requeststate','$requestzip','$requestemail','$requestmobile','$technician','$date')";

    		$insertresult = mysqli_query($conn,$sqlinsert) or die('connection_aborted');
    		if ($insertresult == TRUE) {
    		$msg = "<div class='alert alert-success mt-2'>Technician has assign work Successfully!</div>";
    		}else {
    			$msg = "<div class='alert alert-danger mt-2'>Unable to assign !</div>";
    		}

    	}
    }

    //request delete close button query
    if (isset($_REQUEST['close'])) {
    	$delete = "DELETE FROM `submit_request` WHERE s_id = {$_REQUEST['id']}";
    	$deletequery = mysqli_query($conn,$delete) or die('connection_aborted');
    	if ($deletequery == TRUE) {
         echo '<meta http-equiv="refresh" content="0;URL=?closed">';
    	}
    }
  
 ?>

 <div class="col-sm-12 col-md-7 mt-2">

	<div class="bg-secondary text-white p-2">

		<form action="" method="POST" class="p-2" >

			<h2 class="my-4 text-center">Assign Technician</h2>

			<div class="form-group">
				<strong><label>Request Id :</label></strong>
				<input type="text" name="requestid" id="requestid" placeholder="Request Id" class="form-control" readonlyrr
				value="<?php if(isset($row2['s_id'])) {echo $row2['s_id'];} ?>">
			</div>

			<div class="form-group">
				<strong><label>Request Informatin :</label></strong>
				<input type="text" name="requestinfo" id="requestinfo" placeholder="Request Informatin" class="form-control"value="<?php if(isset($row2['s_information'])) {echo $row2['s_information'];} ?>">
			</div>

			<div class="form-group">
				<strong><label>Request Description :</label></strong>
				<input type="text" name="requestdesc" id="requestdesc" placeholder="Request Description" class="form-control"value="<?php if(isset($row2['s_description'])) {echo $row2['s_description'];} ?>">
			</div>

			<div class="form-group">
				<strong><label>Request Name :</label></strong>
				<input type="text" name="requestname" id="requestname" placeholder="Request Name" class="form-control" value="<?php if(isset($row2['s_name'])) {echo $row2['s_name'];} ?>">
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col">
						<strong><label>Address1 :</label></strong>
						<input type="text" class="form-control" name="requestaddress1" id="requestaddress1" placeholder="Address1"
						value="<?php if(isset($row2['s_address1'])){echo $row2['s_address1'];} ?>">
					</div>
					<div class="col">
						<strong><label>Address2 :</label></strong>
						<input type="text" class="form-control" placeholder="Address2" name="requestaddress2" id="requestaddress2" value="<?php if(isset($row2['s_address2'])){echo $row2['s_address2'];} ?>">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col">
						<strong><label>City :</label></strong>
						<input type="text" class="form-control" name="requestcity" id="requestcity" placeholder="City"
						value="<?php if(isset($row2['s_city'])){echo $row2['s_city'];}?>">
					</div>
					<div class="col">
						<strong><label>State :</label></strong>
						<input type="text" class="form-control" placeholder="State" name="requeststate" id="requeststate" value="<?php if(isset($row2['s_state'])){echo $row2['s_state'];}?>">
					</div>
					<div class="col">
						<strong><label>Zip :</label></strong>
						<input type="text" class="form-control" placeholder="Zip" name="requestzip" id="requestzip" onkeypress="isInputNumber(event)"
						value="<?php if(isset($row2['s_zip'])){echo $row2['s_zip'];}?>">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col">
						<strong><label>Email :</label></strong>
						<input type="email" class="form-control" name="requestemail" id="requestemail" placeholder="Email" value="<?php if(isset($row2['s_email'])){echo $row2['s_email'];}?>">
					</div>
					<div class="col">
						<strong><label>Mobile :</label></strong>
						<input type="text" class="form-control" placeholder="Mobile" name="requestmobile" id="requestmobile" onkeypress="isInputNumber(event)"
						value="<?php if(isset($row2['s_mobile'])){echo $row2['s_mobile'];}?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<strong><label>Technician :</label></strong>
						<input type="text" class="form-control" name="technician" id="technician" placeholder="Technician">
					</div>
					<div class="col">
						<strong><label>Date :</label></strong>
						<input type="date" class="form-control" name="date" id="date">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Submit">
				<input type="submit" class="btn btn-danger" name="close" value="Close">
				<?php if (isset($msg)) {echo $msg;} ?>
			</div>
		</form>
	</div>
</div>

</div>
	</div>
</div>

<script>

	function isInputNumber(evt){
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>

<?php include"includes/footer.php";?>