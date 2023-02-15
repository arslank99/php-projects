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

<html lang="en">
	<head>
		<meta charset="UTF-8">
		 <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap Css-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<!-- Font Awesome-->
         <link rel="stylesheet" href="../css/fontawesome/css/all.css">
		<!-- Google Font-->
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Open+Sans:wght@300;400;500&family=Raleway:wght@100;200;300;400&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<!-- Custom Css-->
		<link rel="stylesheet" href="../css/style.css">
		<title><?php echo TITLE ?></title>
	</head>
	<body>

<!-- Start Navigation-->
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="requesterprofile.php">OSMS</a>
	</div>
</nav>
<div class="container-fluid mt-1" id="Profile">
<div class="row">
<div class="col-md-2 bg-light position-static d-print-none p-0">
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mymenu">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse ms-4 mt-2" id="mymenu">
			<ul class="navbar-nav custom-nav flex-column">
				<li class="nav-item">
					<a class="p-2 nav-link <?php if(PAGE == 'requester-profile'){echo('active bg-secondary text-white');}?>" href="requester-profile.php">
						<i class="fas fa-user me-2"></i>
						Profile
					</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link <?php if(PAGE == 'submit-request'){echo('active bg-secondary text-white');}?>" href="submit-request.php">
					<i class="fab fa-accessible-icon me-2"></i>Submit Request</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link<?php if(PAGE == 'service-status'){echo('active bg-secondary text-white');}?>" href="service-status.php">
					<i class="fas fa-align-center me-2"></i>Services Status</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link<?php if(PAGE == 'change-password'){echo('active bg-secondary text-white');}?>" href="change-password.php">
					<i class="fas fa-key me-2"></i>Change Password</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link" href="../logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
</div>


