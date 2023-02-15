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
<div class="col-md-1"></div>
<div class="col-sm-12 col-md-8">
  <h1 class="text-center my-3">All User Data here</h1>
  <?php
  $sql = "SELECT * FROM login_tb";
  $result = mysqli_query($conn,$sql) or die("connection failed");
  if(mysqli_num_rows($result) > 0 ){ ?>
<div class="my-2">
  <a href="requester-add.php" class="btn btn-danger text-white">Add New User</a>
</div>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Requester id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php  while($row = mysqli_fetch_assoc($result)){  ?>
<tr>
  <td><?php echo $row["u_id"];?></td>
  <td><?php echo $row["u_name"];?></td>
  <td><?php echo $row["u_email"];?></td>
  <td>
    <form action="requester-update.php" method="post" class="d-inline">
      <input type="hidden" name="id" value="<?php echo $row['u_id'];?>">
      <button class="btn btn-info" name="edit"><i class="fa fa-pencil-alt"></i></button>
    </form>
    <form action="" method="post" class="d-inline">
      <input type="hidden" name="delete" value="<?php echo $row['u_id'];?>">
      <button class="btn btn-secondary"><i class="fa fa-trash"></i></button>
    </form>
  </td>
</tr>
<?php
}
}
?>

<?php

if (isset($_REQUEST['delete'])) {
$delete = "DELETE FROM login_tb WHERE u_id = {$_REQUEST['delete']}";
$deletequery = mysqli_query($conn,$delete) or die("connection_aborted");
if ($deletequery == TRUE) {
echo '<meta http-equiv="refresh" content="0;URL=?closed">';
}else {
echo 'Not Deleted';
}
}

?>




</tbody>
</table>
</div>
<?php include"includes/footer.php";?>