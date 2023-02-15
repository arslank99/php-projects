
<?php include"database.php";?>
<?php 

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
     <link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
     <link rel="manifest" href="/site.webmanifest">
     <!-- google fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- owl carousel slider css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="css/webfonts/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo TITLE; ?></title>
</head>
<body>
<!-- Start Navigation -->
<div class="container-fluid over p-0">
<nav class="navbar navbar-expand-sm navbar-dark px-5 fixed-top">
    <a class="navbar-brand" href="index.php">Ischool</a>
    <span class="navbar-text text-white">Learn and Implement</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse px-5" id="navbarNav">
      <ul class="navbar-nav custom-nav">
        <li class="nav-item custom-nav-item">
          <a class="nav-link"  href="index.php">Home</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="payment-status.php">Payment Status</a>
        </li>
            <?php
                session_start();
                if (isset($_SESSION['is_login'])) {
                echo'<li class="nav-item custom-nav-item">
                  <a class="nav-link" href="student/student-profile.php">My Profile</a>
                </li>
                <li class="nav-item custom-nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>';
                }else {
                echo '<li class="nav-item custom-nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</a>
                </li>
                <li class="nav-item custom-nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#RegistrationModal">Sign Up</a>
                </li>';
                }
            ?>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#feedback">Feedback</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#contact">Contact Us</a>
        </li>
      </ul>
    </div>
</nav>
</div><!-- end navigation -->