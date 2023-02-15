
<?php include"includes/header.php";?>
<?php 
if (!isset($_SESSION)) {
session_start();
}
if (isset($_SESSION['is_login'])) {
 $stuemail = $_SESSION['loginemail'];
}else {
header("location: ../index.php");
}
?>

<?php   
 $change_pass = "SELECT `stu_id`,`stu_password` FROM student WHERE stu_email = '$stuemail'";
 $change_result = mysqli_query($conn,$change_pass) or die("failed");
 if(mysqli_num_rows($change_result) == 1 ){
    $row = mysqli_fetch_assoc($change_result);
 }
?>

<?php 
 if(isset($_REQUEST['update-password'])){
      if($_REQUEST['password'] == ""){
         $msg = "<div class='alert alert-danger mt-1 w-50'>Fill The Password Field</div>";
      }else{
           $id = $_REQUEST['id']; 
           $password = $_REQUEST['password'];
            $query_pass = "UPDATE student SET stu_password = '$password' WHERE stu_id = '$id'";
           $conclusion = mysqli_query($conn,$query_pass) or die("failed");
           if($conclusion == TRUE){
            $msg = "<div class='alert alert-success mt-1 w-50'>Password Updated</div>";
           }else{
            $msg = "<div class='alert alert-danger mt-1 w-50'>Password Not Updated</div>";
           }

      }
 }
  
?>
<div class="col-md-6 mt-3">
    <form action="" method="POST" class="p-4 custom-color text-white">
        <div class="form-group">
            <strong><label for="">Student Id :</label></strong>
            <input type="text" name="id" class="form-control mt-1" readonly value="<?php echo $row['stu_id'];?>">
        </div>
        <div class="form-group">
            <strong><label for="">Student Password :</label></strong>
            <input type="text" name="password" value="<?php echo $row['stu_password'];?>" class="form-control mt-1">
        </div>
        <div class="form-group mt-2">
            <input type="submit" name="update-password" value="Update" class="btn btn-outline-danger">
        </div>
        <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>
<?php include"includes/footer.php";?>