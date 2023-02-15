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
 
 if (isset($_REQUEST["sellbtn"])) {
  	$sqlite = "SELECT * FROM product_tb WHERE product_id = {$_REQUEST['sellid']}";
  	$conclusion = mysqli_query($conn,$sqlite) or die("connection_aborted");
  	if ($conclusion == TRUE) {
  		$row = mysqli_fetch_assoc($conclusion);
  	}else {
  		echo 'error log';
  	}
  } 


 ?>

<?php
if (isset($_REQUEST['cadd'])) {

	if($_REQUEST['cname'] == "" || $_REQUEST['caddress'] == "" || $_REQUEST['pname'] == "" || $_REQUEST['cavailable'] == ""  || $_REQUEST['quantity'] == "" || $_REQUEST['priceeach'] == "" || $_REQUEST['quantity'] == "" || $_REQUEST['cdate'] == "" ) {
		$msg = "<div class='alert alert-warning mt-2'>Please Fill Empty Fields</div>";
	}else {

		$pid = $_REQUEST['pid'];
		$cavail  = $_REQUEST['cavailable'] - $_REQUEST['quantity'];

		$cname  = $_REQUEST['cname'];
		$caddress =  $_REQUEST['caddress'];
		$pname    = $_REQUEST['pname'];
		$available = $_REQUEST['cavailable'];
		$quantity  =  $_REQUEST['quantity'];
		$priceeach = $_REQUEST['priceeach'];
        $cdate  = $_REQUEST['cdate'];
        $totalprice = $_REQUEST['totalprice'];
		$sql = "INSERT INTO `sellproduct_tb`(`customer_name`, `customer_address`, `product_name`, `available`, `quantity`, `sell_each_product`,`total_price`,`date`) VALUES ('$cname','$caddress','$pname','$available','$quantity','$priceeach','$totalprice','$cdate')";
		$result = mysqli_query($conn,$sql) or die("connection_aborted");
		if ($result == TRUE) {
			$generateid = mysqli_insert_id($conn);
			session_start();
			$_SESSION['myid'] = $generateid;
			header("location: product-view.php");
			$updatequery = "UPDATE `asset_tb` SET available = '$cavail' WHERE product_id = $pid";
			$queryresult = mysqli_query($conn,$updatequery) or die('connection_aborted');
		}else {
			$msg = "<div class='alert alert-danger mt-2'>product Failed to Add</div>";
		}
	}
}
?>

<div class="col-md-10">
	<div class="container">
		<div class="row text-center mt-1 p-1">
			<div class="col-md-12 bg-dark text-white">
				<h4 class="p-1">Sell Customers Form</h4>
			</div>
		</div>

<div class="row mt-1">
	<div class="col-md-8">
	<form action="" method="POST" class="p-3 bg-secondary text-white">
		<h2 class="p-3 text-center">Customer Bill</h2>
	 <div class="form-group">
      <label for=""><strong>Product id:</strong></label>
       <input type="text" class="form-control" name="pid" value="<?php if(isset($row['product_id'])){echo $row['product_id'];}?>" readonly>
     </div>
     <div class="form-group">
      <label for=""><strong>customer Name:</strong></label>
       <input type="text" class="form-control" name="cname">
     </div>
     <div class="form-group">
      <label for=""><strong>customer address :</strong></label>
       <input type="text" class="form-control" name="caddress">
     </div>
     <div class="form-group">
      <label for=""><strong>product Name:</strong></label>
       <input type="text" class="form-control" name="pname">
     </div>
     <div class="form-group">
      <label for=""><strong>available :</strong></label>
       <input type="text" class="form-control" name="cavailable" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>quantity :</strong></label>
       <input type="text" class="form-control" name="quantity" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>price each :</strong></label>
       <input type="text" class="form-control" name="priceeach" onkeypress="isInputNumber(event)">
     </div>
     <div class="form-group">
      <label for=""><strong>Total Price :</strong></label>
       <input type="text" class="form-control" name="totalprice" onkeypress="isInputNumber(event)">
     </div>
      <div class="form-group">
      <label for=""><strong>Date :</strong></label>
       <input type="date" class="form-control" name="cdate">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="cadd" value="Submit">
       <a href="assets.php" type="submit" class="btn btn-danger text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
  </form>
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