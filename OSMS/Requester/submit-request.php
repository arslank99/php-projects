<?php 
include"includes/header.php";
include"../database.php";
session_start();
if($_SESSION['is_login']) {
     $email = $_SESSION['email'];
}else {
	header("location: requester-login.php");
}

 ?>


<?php
if (isset($_REQUEST['submitRequest'])) {
	//this is empty checking code 
	if ($_REQUEST['Requestinfo'] == "" || $_REQUEST['Description'] == "" ||
	$_REQUEST['Name'] == "" || $_REQUEST['Address1'] == "" ||
	$_REQUEST['Address2'] == "" || $_REQUEST['cityRequest'] == "" ||
	$_REQUEST['stateRequest'] == "" || $_REQUEST['Requestzip'] == "" ||
	$_REQUEST['RequestEmail'] == "" || $_REQUEST['RequestMobile'] == "" ||
	$_REQUEST['RequestDate'] == "") {
	$msg = "<div class='alert alert-warning mt-2'>Fill the Empty Fields </div>";
    //this is value getting code
	}else {
	$information = $_REQUEST['Requestinfo'];
	$description = $_REQUEST['Description'];
	$name = $_REQUEST['Name'];
	$address1 = $_REQUEST['Address1'];
	$address2 = $_REQUEST['Address2'];
	$city = $_REQUEST['cityRequest'];
	$state = $_REQUEST['stateRequest'];
	$zip = $_REQUEST['Requestzip'];
	$email = $_REQUEST['RequestEmail'];
	$mobile = $_REQUEST['RequestMobile'];
	$date = $_REQUEST['RequestDate'];
    //this is query code
	$sql = "INSERT INTO submit_request(s_information,s_description,s_name,s_address1,s_address2,s_city,s_state,s_zip,s_email,s_mobile,s_date) VALUES('".$information."','".$description."','".$name."','".$address1."','".$address2."','".$city."','".$state."','".$zip."','".$email."','".$mobile."','".$date."')";

	$query = mysqli_query($conn,$sql) or die('connection_aborted');
	if ($query == TRUE) {
		$genid = mysqli_insert_id($conn);
		$msg = "<div class='alert alert-success mt-2'>Request Submitted Successfully</div>";
		$_SESSION['myid'] = $genid;
		header("location: recipt.php");
	}else {
		$msg = "<div class='alert alert-success mt-2'>Unable to sent request </div>";
	}
	}
	
}
?>



<div class="col-sm-9 col-md-10 mt-3">
	<form action="" method="POST" class="mx-4">
		<div class="form-group">
			<strong><label for="inputrequest">Request Information :</label></strong>
			<input type="text" placeholder="Request Information" name="Requestinfo" id="Requestinfo" class="form-control mt-1">
		</div>
		<div class="form-group">
			<strong><label for="inputrequest">Description :</label></strong>
			<input type="text" placeholder="Write Description" name="Description" id="Description" class="form-control mt-1">
		</div>
		<div class="form-group">
			<strong><label for="inputrequest">Name :</label></strong>
			<input type="text" placeholder="Name" name="Name" id="name" class="form-control mt-1">
		</div>
		<!-- this is row group 1 -->
		<div class="row-group d-flex mt-1">
			<div class="col-md-6 me-2">
				<div class="form-group">
				<strong><label for="inputrequest">Address Line 1 :</label></strong>
				<input type="text" placeholder="House.No 123" name="Address1" id="Address1" class="form-control mt-1">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<strong><label for="inputrequest">Address Line 2 :</label></strong>
					<input type="text" placeholder="Railway Colony" name="Address2" id="Address2" class="form-control mt-1">
				</div>
			</div>
		</div>
		<!-- this is row group 2-->
		<div class="row-group d-flex mt-1">
			<div class="col-md-5 me-1">
				<div class="form-group">
					<strong><label for="inputrequest">City :</label></strong>
					<input type="text" name="cityRequest" id="cityRequest" class="form-control mt-1">
				</div>
			</div>
			<div class="col-md-4 ms-1">
				<div class="form-group">
					<strong><label for="inputrequest">State :</label></strong>
					<input type="text" name="stateRequest" id="stateRequest" class="form-control mt-1">
				</div>
			</div>
			<div class="col-md-3 ms-1">
				<div class="form-group">
					<strong><label for="inputrequest">Zip :</label></strong>
					<input type="text" name="Requestzip" id="RequestZip" class="form-control mt-1"
					onkeypress="isInputNumber(event)">
				</div>
			</div>
		</div>
		
		
		<!-- this is row group 3-->
		<div class="row-group d-flex mt-1">
			<div class="col-md-5 me-1">
				<div class="form-group">
					<strong><label for="inputrequest">Email :</label></strong>
					<input type="email" name="RequestEmail" id="RequestEmail" class="form-control mt-1">
				</div>
			</div>
			<div class="col-md-4 ms-1">
				<div class="form-group">
					<strong><label for="inputrequest">Mobile :</label></strong>
					<input type="text" name="RequestMobile" class="form-control mt-1" onkeypress="isInputNumber(event)">
				</div>
			</div>
			<div class="col-md-3 ms-1">
				<div class="form-group">
					<strong><label for="inputrequest">Date :</label></strong>
					<input type="date" name="RequestDate" id="RequestDate" class="form-control mt-1">
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger mt-2" name="submitRequest">Submit</button>
		<button type="reset" class="btn btn-secondary mt-2" name="resetRequest">Reset</button>
	</form>
	<div class="col-md-4"><?php if (isset($msg)) { echo $msg; } ?></div>
</div>

<!-- javascript function -->

<script>
	function isInputNumber(evt){
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>


<?php include"includes/footer.php"; ?>