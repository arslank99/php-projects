
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
 $feed_select = "SELECT * FROM `student` WHERE `stu_email` = '{$stuemail}'";
 $feed_result = mysqli_query($conn,$feed_select) or die("failed");
 if(mysqli_num_rows($feed_result) == 1){
   $row = mysqli_fetch_assoc($feed_result);
   $student_id = $row["stu_id"]; 
 }
?>

<?php 
   
   if(isset($_REQUEST["feedbtn"])){

      if($_REQUEST["feedback"] == ""){
        $msg = "<div class='alert alert-warning mt-1'>Fill Feedback Field<div>";
      }else{
        $stuname_id = $_REQUEST['id'];
        $stu_feedback = $_REQUEST['feedback'];
        $feed_insert = "INSERT INTO `feedback`(stu_id,f_content) VALUES('  $stuname_id','$stu_feedback')";
        $feed_conclusion = mysqli_query($conn,$feed_insert) or die("failed");
        if($feed_conclusion == TRUE){
        $msg = "<div class='alert alert-success mt-1'>Feedback Updated<div>"; 
        }else{
         $msg = "<div class='alert alert-danger mt-1'>Feedback Not Updated<div>"; 
        }

        
    }

   }
   
?>


<div class="col-md-6 mt-2">
<form action="" method="POST" class="p-4 custom-color text-white">
        <div class="form-group">
            <strong><label for="">Student Id :</label></strong>
            <input type="text" name="id" class="form-control mt-1" readonly value="<?php echo $student_id;?>">
        </div>
        <div class="form-group">
            <strong><label for="">Student Feedback:</label></strong>
            <input type="text" name="feedback" class="form-control mt-1">
        </div>
        <div class="form-group mt-2">
            <input type="submit" name="feedbtn" value="Update" class="btn btn-outline-danger">
        </div>
        <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>

<?php include"includes/footer.php";?>