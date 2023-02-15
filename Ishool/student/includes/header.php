<?php
include '../database.php';
if (isset($_GET['filename'])) {
$filename = $_GET['filename'];
}else {
$url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$name2 =pathinfo($url, PATHINFO_FILENAME);
$filename = $name2;
}
define('TITLE',str_replace("-"," ",strtoupper($filename)));
define('PAGE', $filename);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- favicon icon -->
     <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon_io/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon_io/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon_io/favicon-16x16.png">
     <link rel="manifest" href="/site.webmanifest">
     <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- owl carousel slider css -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../css/webfonts/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo TITLE; ?></title>
</head>
<body>
<!-- Start Navigation-->
<nav class="navbar navbar-expand-sm custom-color navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="student-profile.php">
        Ischool E-Learning Project
    </a>
    </div>
</nav>
<div class="container-fluid" id="Profile">
<div class="row">
<div class="col-md-3 bg-light position-static d-print-none p-0">
              <?php 
                 session_start();
                if (isset($_SESSION['is_login'])) {
                   $stuemail = $_SESSION['loginemail'];
                   }//else {
                //    header("location: ../index.php");
                //    }
                 $select = "SELECT stu_img FROM student WHERE stu_email = '$stuemail'";
                 $sql = mysqli_query($conn,$select) or die("connection failed");
                 if(mysqli_num_rows($sql) == 1){
                    $row = mysqli_fetch_assoc($sql);
                 }
                
                ?>
    <img src="<?php echo $row['stu_img'];?>" alt="hashir" class="img-fluid rounded-circle p-2">
    <nav class="navbar navbar-expand-sm bg-light navbar-dark">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-4" id="mymenu">
            <ul class="navbar-nav custom-nav flex-column">
                <li class="nav-item">
                    <a class="p-2 nav-link my-1 text-primary" href="student-profile.php">
                    <i class="fa fa-users me-2"></i>Profile</a>
                </li>
                 <li class="nav-item">
                    <a class="p-2 nav-link my-1 text-primary" href="">
                    <i class="fa fa-book-open me-2"></i>My Courses</a>
                </li>
                 <li class="nav-item">
                    <a class="p-2 nav-link my-1 text-primary" href="feedback.php">
                    <i class="far fa-comment-alt me-2"></i>Feedback</a>
                </li>
                <li class="nav-item">
                <a class="p-2 nav-link text-primary my-1" href="change-password.php">
                <i class="fas fa-key me-2"></i>Change Password</a>
                </li>
                <li class="nav-item">
                <a class="p-2 text-primary nav-link" href="../logout.php">
                <i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
