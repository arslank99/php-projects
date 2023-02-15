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
<?php
if (isset($_REQUEST['add'])) {
	if($_REQUEST['pname'] == "" || $_REQUEST['pdate'] == "" || $_REQUEST['pavailable'] == "" || $_REQUEST['ptotal'] == ""  || $_REQUEST['originalcost'] == "" || $_REQUEST['sellingprice'] == "") {
		$msg = "<div class='alert alert-warning mt-2'>Please Fill Empty Fields</div>";
	}else {
		$pname  = $_REQUEST['pname'];
		$pdate = $_REQUEST['pdate'];
		$pavailable  = $_REQUEST['pavailable'];
		$ptotal = $_REQUEST['ptotal'];
    $originalcost = $_REQUEST['originalcost'];
    $sellingprice = $_REQUEST['sellingprice'];
		$sql = "INSERT INTO `product_tb`(`product_name`,`product_date`,`available`,`total`,`original_cost`,`selling_price`) VALUES ('$pname','$pdate','$pavailable','$ptotal','$originalcost','$sellingprice')";
		$result = mysqli_query($conn,$sql) or die("connection_aborted");
		if ($result == TRUE) {
			$msg = "<div class='alert alert-success mt-2'>product Added Successfully</div>";
		}else {
			$msg = "<div class='alert alert-danger mt-2'>product Failed to Add</div>";
		}
	}
}
?>


<div class="col-md-8 bg-secondary text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Add New product </h3>
</div>
  <form action="" method="POST" class="p-2">
     <div class="form-group">
      <label for=""><strong>product Name:</strong></label>
       <input type="text" class="form-control" name="pname">
     </div>
     <div class="form-group">
      <label for=""><strong>product_date :</strong></label>
       <input type="date" class="form-control" name="pdate">
     </div>
     <div class="form-group">
      <label for=""><strong>available :</strong></label>
       <input type="text" class="form-control" name="pavailable" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>total :</strong></label>
       <input type="text" class="form-control" name="ptotal" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>original_cost :</strong></label>
       <input type="text" class="form-control" name="originalcost" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>selling_price :</strong></label>
       <input type="text" class="form-control" name="sellingprice" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="add" value="Submit">
       <a href="assets.php" type="submit" class="btn btn-danger text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
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