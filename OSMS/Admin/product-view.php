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
		<div class="row">
			<div class="col-md-6">
				<?php
				$sql = "SELECT * FROM `sellproduct_tb` WHERE sell_id = {$_SESSION['myid']}";
				$result = mysqli_query($conn,$sql) or die("connection aborted");
				if ($result == TRUE) {
					$row = mysqli_fetch_assoc($result);
				}else {
					echo 'error_log';
				}
				?>
				<div class="container mt-3 text-center">
					<h3><strong>Customer Details</strong></h3>
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th>Sell id</th>
								<td><?php if(isset($row['sell_id'])){echo $row['sell_id'];}?></td>
							</tr>
							<tr>
								<th>Customer Name</th>
								<td><?php if(isset($row['customer_name'])){echo $row['customer_name'];}?></td>
							</tr>
							<tr>
								<th>Customer Address</th>
								<td><?php if(isset($row['customer_address'])){echo $row['customer_address'];}?></td>
							</tr>
							<tr>
								<th>Product Name</th>
								<td><?php if(isset($row['product_name'])){echo $row['product_name'];}?></td>
							</tr>
							<tr>
								<th>Quantity</th>
								<td><?php if(isset($row['quantity'])){echo $row['quantity']; }?></td>
							</tr>
							<tr>
								<th>Sell Each Product</th>
								<td><?php if(isset($row['sell_each_product'])){echo $row['sell_each_product'];}?></td>
							</tr>
							<tr>
								<th>Date</th>
								<td><?php if(isset($row['date'])){echo $row['date'];}?></td>
							</tr>
						</tbody>
					</table>
					<form class='d-print-none float-right'>
						<input class='btn btn-danger' type='submit' value='print' onClick ='window.print()'>
						<a href="assets.php" class="btn btn-secondary text-white">Close</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include"includes/footer.php";?>