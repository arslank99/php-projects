
<?php 

if (isset($_REQUEST['Register'])) {

if($_REQUEST['rName'] == "" || $_REQUEST['rEmail'] == "" || $_REQUEST['rPassword'] == ""){
$regmsg = '<div class="alert alert-warning mt-2">All Fields Are Required</div>';
}else{
//Verify email check
$sql = "SELECT u_email FROM login_tb WHERE u_email = '".$_REQUEST['rEmail']."'";
$result = mysqli_query($conn,$sql) or die('connection_aborted');
if (mysqli_num_rows($result) == 1) {
$regmsg = '<div class="alert alert-warning mt-2">Email Is Already Taken</div>';
}else{
// this is code data fields
$user_name = $_REQUEST['rName'];
$user_email = $_REQUEST['rEmail'];
$user_password = $_REQUEST['rPassword'];

$sqlite = "INSERT INTO login_tb(u_name,u_email,u_password) VALUES('$user_name','$user_email','$user_password')";
$succ = mysqli_query($conn,$sqlite) or die('connection_aborted');
if ( $succ == TRUE) {
$regmsg = "<div class='alert alert-success mt-2'>User Email Successfully Created </div>";
}else{
$regmsg = "<div class='alert alert-success mt-2'>Unable to Create</div>";
}
}

}

}



 ?>

<!-- Start Registration form -->
<div class="container mt-5 text-center" id="Register">
     <div class="row">
          <div class="col-md-12" style="font-family: 'Ubuntu', sans-serif;">
               <h2>Registration Form</h2>
          </div>
     </div>
</div>
<div class="container mt-3">
     <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
               <form action="" method="POST" class="shadow-lg p-4">
                    <div class="form-group">
                         <i class="fa fa-user"></i>
                         <strong><label>Name</label></strong>
                         <input type="text" class="form-control mt-1" placeholder="Name" name="rName">
                    </div>
                    <div class="form-group mt-2">
                         <i class="fa fa-user"></i>
                         <strong><label for="email">Email</label></strong>
                         <input type="email" class="form-control mt-1" placeholder="Email" name="rEmail">
                         <small class="form-text">We'll never share your email with anyone else. </small>
                    </div>
                    <div class="form-group mt-2">
                         <i class="fa fa-key"></i>
                         <strong><label for="password">password</label></strong>
                         <input type="password" class="form-control mt-1" placeholder="Password" name="rPassword">
                    </div>
                    <div class="form-group">
                         <button type="submit" name="Register" class="btn btn-outline-danger btn-block mt-5 shadow-sm" style="width:100%;">Sign Up</button>
                         <?php if (isset($regmsg)){echo $regmsg;} ?>
                         <em style="font-size:11px;">Note - By clicking Sign up you agree to our terms, Data Policy and Cookie Policy</em>
                    </div>
               </form>
          </div>
          <div class="col-md-3"></div>
     </div>
</div>
<!-- Start Registration form  end-->