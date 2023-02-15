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

<div class="col-sm-12 col-md-6 mt-2 ms-4">

<?php
//this is select query 
$sql = "SELECT adminemail,adminpassword FROM admin_tb WHERE adminemail = '$aEmail'";
$result = mysqli_query($conn,$sql) or die("connection failed");

if (mysqli_num_rows($result) == 1) {
$row = mysqli_fetch_assoc($result);
$adminpassword = $row['adminpassword'];

}


//this is update query 
if (isset($_REQUEST['update'])) {

if ($_REQUEST['adminpassword'] == ""){
$msg = "<div class='alert alert-warning'>Fill the Password field</div>";
}else{
$adminpassword = $_REQUEST['adminpassword'];
$sql = "UPDATE admin_tb SET adminpassword = '$adminpassword' WHERE adminemail = '$aEmail'";
if (mysqli_query($conn,$sql) == TRUE ) {
$msg = "<div class='alert alert-success'>Password Updated Successfully</div>";
} else{
$msg = "<div class='alert alert-danger'>Password Not Updated Successfully</div>";
}
}

}

?>

<form action="" method="POST">
     <div class="form-group mb-3" >
          <strong><label for="name">Email:</label></strong>
          <input type="email" name="rEmail" id="rEmail" class="form-control" 
           value="<?php echo $aEmail;?>" readonly>
     </div>
     <div class="form-group" >
          <strong><label for="password">Password:</label></strong>
          <input type="password" name="adminpassword" id="adminpassword" class="form-control" 
           value="<?php echo $adminpassword;?>">
     </div>
     <div class="mt-2">
          <?php if (isset($msg)){ echo $msg;}?>
     </div>
     <div class="form-group mt-3">
          <button type="submit" class="btn btn-danger" name="update">Update</button>
          <button type="submit" class="btn btn-secondary" name="reset" onclick= "clearInput()">Reset</button>
     </div>
</form>

</div>

<script type="text/javascript">
	function clearInput(){
      var getValue= document.getElementById("adminpassword");
        if (getValue.value !="") {
            getValue.value = "";
        }
 }
</script>


<?php include"includes/footer.php";?>