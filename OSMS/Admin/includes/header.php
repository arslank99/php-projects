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

<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/x-icon" href="../images/favicon.icon">
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
		<a class="navbar-brand" href="dashboard.php?filname=dashboard.php">OSMS</a>
	</div>
</nav>
<div class="container-fluid" id="Profile">
<div class="row">
<div class="col-md-2 bg-light position-static d-print-none p-0">
	<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mymenu">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse ms-4" id="mymenu">
			<ul class="navbar-nav custom-nav flex-column">
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=dashboard.php'){echo('active bg-danger text-white');}?>" href="dashboard.php?filename=dashboard.php">
					<i class="fas fa-chart-line mr-2"></i>Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link  my-1 <?php if('filename=work-order.php'){echo('active bg-danger text-white');}?>" href="work-order.php?filename=work-order.php">
					<i class="fab fa-accessible-icon mr-2"></i>Work Order</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=requests.php'){echo('active bg-danger text-white');}?>" href="requests.php?filename=requests.php">
					<i class="fas fa-align-center mr-2"></i>Requests</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=assets.php'){echo('active bg-danger text-white');}?>" href="assets.php?filename=assets.php">
					<i class="fas fa-database mr-2"></i>Assets</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=technician.php'){echo('active bg-danger text-white');}?>" href="technician.php?filename=technician.php">
					<i class="fas fa-screwdriver mr-2"></i>Technician</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=requester.php'){echo('active bg-danger text-white');}?>" href="requester.php?filename=requester.php">
					<i class="fas fa-users mr-2"></i>Requester</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=sell-report.php'){echo('active bg-danger text-white');}?>" href="sell-report.php?filename=sell-report.php">
					<i class="fas fa-file mr-2"></i>Sell Report</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=work-report.php'){echo('active bg-danger text-white');}?>" href="work-report.php?filename=work-report.php">
					<i class="fas fa-file mr-2"></i>Work Report</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link my-1 <?php if('filename=change-password.php'){echo('active bg-danger text-white');}?>" href="change-password.php?filename=change-password.php">
					<i class="fas fa-key mr-2"></i>Change Password</a>
				</li>
				<li class="nav-item">
					<a class="p-2 nav-link" href="../logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
</div>

