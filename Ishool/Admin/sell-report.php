<?php
  include"includes/header.php";
  if(!isset($_SESSION)){
    session_start();
 }
 if(isset($_SESSION['admin_login'])){
    $_SESSION['admin_login'];
 } else{
    header("location: ../index.php");
 }
?>

<div class="col-md-10">
<div class="col-md-10">
	<div class="container">
		<div class="row p-2 mt-2 bg-dark text-white text-center">
			<div class="col-md-12">
				<h3>Sell Report</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mt-3">
				<form action="" method="POST" class="form-inline" >
					<div class="form-group">
						<div class="row">
							<div class="col">
								<input type="date" class="w-50 form-control" name="startdate">
							</div>
								<strong class=""><label> to :</label></strong>
							<div class="col">
								<input type="date" class="form-control" name="enddate">
							</div>
							<div class="col">
						       <input type="submit" name="sellbtn" class="btn btn-danger text-white" value="Search">
					        </div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row mt-2 text-center">
			<div class="col-md-12">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>id</th>
							<th>Cust name</th>
							<th>Cust address</th>
							<th>Product name</th>
							<th>Available</th>
							<th>Quantity</th>
							<th>Sell product</th>
							<th>Total price</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody> 	
						<tr>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td> </td>
							<td></td>
							<td> </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div> 
</div>



<?php include"includes/footer.php";?>