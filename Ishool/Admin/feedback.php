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

<div class="col-md-9">
<h1 class="bg-dark text-white text-center p-2">Student Feedback</h1>
<table class="table table-bordered table-hover text-center">
	<thead>
		<tr>
			<th>Feedback Id </th>
			<th>Feedback Content</th>
			<th>Student Id</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php 
   $sql_feedback = "SELECT * FROM feedback";
   $feedback_result = mysqli_query($conn,$sql_feedback) or die("connection_aborted");
      if (mysqli_num_rows($feedback_result) > 0) {
      while ($row = mysqli_fetch_assoc($feedback_result)){
     ?>
		<tr>
			<td><?php echo $row["f_id"];?></td>
			<td><?php echo $row["f_content"];?></td>
			<td><?php echo $row["stu_id"];?></td>
			<td>
		   <form action="feedback-delete.php" method="POST" class="d-inline">
		   <input type="hidden" name="deleteid" value="<?php echo $row["f_id"];?>">
		   <button class="btn btn-outline-secondary" name="delete-btn">
			<i class="fa fa-trash-restore-alt"></i>
		   </button>	
		   </form>
			</td>
		</tr>
		<?php
		 	}
        }
        ?>
	</tbody>
</table>
</div>



<?php include"includes/footer.php";?>