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

if (isset($_REQUEST["edit"])) {
  $sql = "SELECT * FROM login_tb WHERE u_id = {$_REQUEST['id']}";
  $result = mysqli_query($conn,$sql) or die("connection_aborted");
  if ($result == TRUE) {
    $row = mysqli_fetch_assoc($result);
  }else {
    echo 'error';
  }
}
 ?>


<?php
if (isset($_REQUEST['update'])) {
if (($_REQUEST['uid'] == "" )|| ($_REQUEST['uname'] == "") || ($_REQUEST['uemail']) == "" || (      $_REQUEST['upassword'] == "" )) {
$msg = "<div class='alert alert-warning mt-2'>Fill Empty Fields First</div>";
}else {
$uid = $_REQUEST['uid'];
$uname = $_REQUEST['uname'];
$uemail = $_REQUEST['uemail'];
$upassword = $_REQUEST['upassword'];
$sqlite = "UPDATE `login_tb` SET `u_name`='$uname',`u_email`='$uemail',`u_password`='$upassword' WHERE u_id = '$uid'";
$conclusion = mysqli_query($conn,$sqlite) or die('connection_aborted');
if ($conclusion == TRUE) {
$msg = "<div class='alert alert-success mt-2'>Successfully Updated</div>";
}else {
$msg = "<div class='alert alert-danger mt-2'>Unable to Update</div>";
}
}
}
?>


<div class="col-md-6 bg-secondary text-white">
  <div>
    <h3 class="text-center mt-2 p-2">Update Requester</h3>
  </div>
  <form action="" method="POST" class="p-2">
     <div class="form-group">
      <label for=""><strong>Requester Id :</strong></label>
       <input type="text" class="form-control" name="uid" value="<?php if(isset($row['u_id'])) {echo $row['u_id'];}?>" readonly>
     </div>
     <div class="form-group">
      <label for=""><strong>Requester Name:</strong></label>
       <input type="text" class="form-control" name="uname" value="<?php if(isset($row['u_name'])){echo $row['u_name'];}?>">
     </div>
     <div class="form-group">
      <label for=""><strong>Requester Email :</strong></label>
       <input type="text" class="form-control" name="uemail" value="<?php if(isset($row['u_email'])){echo $row['u_email'];}?>">
     </div>
     <div class="form-group">
      <label for=""><strong>Requester Password :</strong></label>
       <input type="text" class="form-control" name="upassword" value="<?php if(isset($row['u_password'])) {echo $row['u_password'];}?>">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-success mr-2" name="update" value="Update">
       <a href="requester.php" type="submit" class="btn btn-danger text-white">Close</a>
     </div>
     <?php if (isset($msg)) {echo $msg;} ?>
  </form>
</div>



<?php include"includes/footer.php";?>