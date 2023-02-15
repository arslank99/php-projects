<?php include"database.php"; ?>
<?php 
if (isset($_GET['page'])) {
     $pagename = $_GET['page'];
}else {
     $url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
     $name2 =pathinfo($url, PATHINFO_FILENAME);
     $pagename = $name2;

}
     define('TITLE',str_replace("-"," ",strtoupper($pagename)));
     define('PAGE', $pagename);

 ?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <link rel="icon" type="image/x-icon" href="../images/favicon.icon">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- Bootstrap Css-->
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <!-- Font Awesome-->
          <link rel="stylesheet" href="css/all.min.css">
          <!-- Google Font-->
          <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Open+Sans:wght@300;400;500&family=Raleway:wght@100;200;300;400&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

          <link rel="stylesheet" href="css\fontawesome\css\all.css">
          <!-- Custom Css-->
          <link rel="stylesheet" href="css/style.css">
          <title><?php echo TITLE ?></title>
     </head>
     <body>
<!-- Start Navigation-->
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
     <div class="container-fluid">
          <a class="navbar-brand" href="#">OSMS</a>
          <span class="navbar-text">Customer's Happiness is Our Aim</span>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mymenu">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-4" id="mymenu">
               <ul class="navbar-nav custom-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="index.php?filname=index.php">Home</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#Services">Services</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#Register">Registration</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="Requester/requester-login.php">Login</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#Contact">Contact</a>
                    </li>
               </ul>
          </div>
     </div>
     </nav> 
     <!-- End Navigation-->