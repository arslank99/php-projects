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
		<div class="row text-center mt-1">
			<div class="col-md-12 bg-dark text-white">
				<h4>All Products/Parts Details</h4>
			</div>
		</div>

<div class="row mt-1">
	<div class="col-md-12">
		<?php
		$sql = "SELECT * FROM `product_tb`";
		$result = mysqli_query($conn,$sql) or die("connection failed");
		if(mysqli_num_rows($result) > 0 ){ ?>
		<div class="my-2">
			<a href="product-add.php" class="btn btn-danger text-white">Add New Products Details </a>
		</div>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Product id</th>
					<th>Product Name</th>
					<th>Date of Product</th>
					<th>Available</th>
					<th>Total</th>
					<th>Original Cost Cash</th>
					<th>Selling Price Each</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php  while($row = mysqli_fetch_assoc($result)){  ?>
				<tr>
					<td><?php echo $row["product_id"];?></td>
					<td><?php echo $row["product_name"];?></td>
					<td><?php echo $row["product_date"];?></td>
					<td><?php echo $row["available"];?></td>
					<td><?php echo $row["total"];?></td>
					<td><?php echo $row["original_cost"];?></td>
					<td><?php echo $row["selling_price"];?></td>
					<td>
					<form action="product-update.php" method="post" class="d-inline">
						<input type="hidden" name="id" value="<?php echo $row['product_id'];?>">
						<button class="btn btn-info" name="edit"><i class="fa fa-pencil-alt"></i></button>
					</form>
						<form action="" method="post" class="d-inline">
							<input type="hidden" name="delete" value="<?php echo $row['product_id'];?>">
							<button class="btn btn-secondary"><i class="fa fa-trash"></i></button>
						</form>
						<form action="product-sell.php" method="post" class="d-inline">
							<input type="hidden" name="sellid" value="<?php echo $row['product_id'];?>">
							<button class="btn btn-success" name="sellbtn"><i class="fa fa-handshake"></i></button>
						</form>
					</td>
				</tr>
				<?php
				}
				}else {
					echo '<div class="text-info text-center"><h4> 0 Result Found <h4></div>';
				}
				?>
				<?php
				if (isset($_REQUEST['delete'])) {
				$delete = "DELETE FROM product_tb WHERE product_id = {$_REQUEST['delete']}";
				$deletequery = mysqli_query($conn,$delete) or die("connection_aborted");
				if ($deletequery == TRUE) {
				echo '<meta http-equiv="refresh" content="0;URL=?closed">';
				}else {
				echo 'Not Deleted';
				}
				}
				?>
			</div>
		</div>
	</div>
</div>



<?php include"includes/footer.php";?>