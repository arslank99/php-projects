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

<?php
$sql = "SELECT * FROM `admin_tb`";
$result = mysqli_query($conn,$sql) or die("failed");
if(mysqli_num_rows($result) == 1){
 $row = mysqli_fetch_assoc($result);
 $adminpassword = $row["admin_password"];
 $Adminemail = $row["admin_email"];
}?>

<?php 

if(isset($_REQUEST["update"])){
 if($_REQUEST["adminpassword"] == ""){
     $msg = '<div class="alert alert-danger">Fill The Password Field</div>';
 }else{
 $Admin_pasword = $_REQUEST["adminpassword"];
 $admin_email = $_REQUEST["Adminemail"];
 $update = "UPDATE `admin_tb` SET `admin_email`='$admin_email',`admin_password`='$Admin_pasword' WHERE `admin_email` = '{$admin_email}'";
 $update_result = mysqli_query($conn,$update) or die("failed");
if($update_result == TRUE){
 $msg = '<div class="alert alert-success">Password Updated</div>';  
 }else{
 $msg = '<div class="alert alert-success">Failed to Update</div>';      
 }

 }

}

?>


<div class="col-md-5 mt-2">
<form action="" method="POST" class="custom-color p-3 text-white">
     <div class="form-group mb-3" >
          <strong><label for="name">Email:</label></strong>
          <input type="email" name="Adminemail"  class="form-control" 
           value="<?php echo $Adminemail;?>" readonly>
     </div>
     <div class="form-group" >
          <strong><label for="password">Password:</label></strong>
          <input type="text" name="adminpassword" class="form-control" 
           value="<?php echo  $adminpassword;?>">
     </div>
     <div class="mt-2">
          <?php if (isset($msg)){ echo $msg;}?>
     </div>
     <div class="form-group mt-3">
          <button type="submit" class="btn btn-danger" name="update">Update</button>
          <button type="submit" class="btn btn-secondary" name="reset">Reset</button>
     </div>
</form>

</div>



<?php include"includes/footer.php";?>