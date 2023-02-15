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

if (isset($_REQUEST['edit'])) {
  $sqlite = "SELECT * FROM `product_tb` WHERE product_id = {$_REQUEST['id']}";
  $conclusion = mysqli_query($conn,$sqlite) or die("connection_aborted");
  if ( $conclusion == TRUE) {
     $row = mysqli_fetch_assoc($conclusion);
  }else {
    echo 'error';
  }
 
}


?>


<div class="col-md-9">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
<?php
if (isset($_REQUEST['update'])) {
	if($_REQUEST['pname'] == "" || $_REQUEST['pdate'] == "" || $_REQUEST['pavailable'] == "" || $_REQUEST['ptotal'] == ""  || $_REQUEST['originalcost'] == "" || $_REQUEST['sellingprice'] == "") {
		$msg = "<div class='alert alert-warning mt-2'>Please Fill Empty Fields</div>";
	}else {
    $pid =  $_REQUEST['pid'];
		$pname  = $_REQUEST['pname'];
		$pdate = $_REQUEST['pdate'];
		$pavailable  = $_REQUEST['pavailable'];
		$ptotal = $_REQUEST['ptotal'];
    $originalcost = $_REQUEST['originalcost'];
    $sellingprice = $_REQUEST['sellingprice'];
		$sql = "UPDATE `product_tb` SET `product_name`='$pname',`product_date`='$pdate',`available`='$pavailable',`total`='$ptotal',`original_cost`='$originalcost',`selling_price`='$sellingprice' WHERE product_id = '$pid'";
		$result = mysqli_query($conn,$sql) or die("connection_aborted");
		if ($result == TRUE) {
			$msg = "<div class='alert alert-success mt-2'>product updateed Successfully</div>";
		}else {
			$msg = "<div class='alert alert-danger mt-2'>product Failed to update</div>";
		}
	}
}
?>


<div class="col-md-8 bg-secondary text-white m-2">
<div>
    <h3 class="text-center mt-2 p-2">Update product </h3>
</div>
  <form action="" method="POST" class="p-2">
    <div class="form-group">
       <label for=""><strong>product id:</strong></label>
       <input type="text" class="form-control" name="pid" value="<?php if(isset($row['product_id']))echo $row['product_id'];?>" readonly>
     </div>
     <div class="form-group">
      <label for=""><strong>product Name:</strong></label>
       <input type="text" class="form-control" name="pname" value="<?php if(isset($row['product_name']))echo $row['product_name'];?>">
     </div>
     <div class="form-group">
      <label for=""><strong>product_date :</strong></label>
       <input type="date" class="form-control" name="pdate" value="<?php if(isset($row['product_date']))echo $row['product_date'];?>">
     </div>
     <div class="form-group">
      <label for=""><strong>available :</strong></label>
       <input type="text" class="form-control" name="pavailable" onkeypress="isInputNumber(event)"
       value="<?php if(isset($row['available']))echo $row['available'];?>">
     </div>
     <div class="form-group">
      <label for=""><strong>total :</strong></label>
       <input type="text" class="form-control" name="ptotal" onkeypress="isInputNumber(event)" 
       value="<?php if(isset($row['total']))echo $row['total'];?>">
     </div>
     <div class="form-group">
      <label for=""><strong>original_cost :</strong></label>
       <input type="text" class="form-control" name="originalcost" onkeypress="isInputNumber(event)"
       value="<?php if(isset($row['original_cost']))echo $row['original_cost'];?>">
     </div>
     <div class="form-group">
      <label for=""><strong>selling_price :</strong></label>
       <input type="text" class="form-control" name="sellingprice" onkeypress="isInputNumber(event)"
       value="<?php if(isset($row['selling_price']))echo $row['selling_price'];?>">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="update" value="Submit">
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