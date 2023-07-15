<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
$dt = date("Y-m-d");
$hr = date("H");
$dttim = date("Y-m-d H:i:s");
include("includes/config.php");
if(isset($_SESSION['UserName']))
{
	$sqlstaffprofile = "SELECT * FROM admin where UserName ='" . $_SESSION['UserName'] . "'";
	$qsqlstaffprofile = mysqli_query($dbh,$sqlstaffprofile);
	echo mysqli_error($dbh);
	$rsstaffprofile = mysqli_fetch_array($qsqlstaffprofile);
}
if(isset($_SESSION['Email']))
{
	$sqlstudentprofile = "SELECT * FROM mentors where Email ='" . $_SESSION['Email'] . "'";
	$qsqlstudentprofile = mysqli_query($dbh,$sqlstudentprofile);
	echo mysqli_error($dbh);
	$rsstudentprofile = mysqli_fetch_array($qsqlstudentprofile);
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
<link rel="stylesheet" href="css/prism/prism.css" media="screen">
<link rel="stylesheet" href="css/select2/select2.min.css">
<link rel="stylesheet" href="css/main.css" media="screen">
<script src="js/modernizr/modernizr.min.js"></script>
<nav class="navbar top-navbar bg-white box-shadow">
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
	<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
	<link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
	<link rel="stylesheet" href="css/icheck/skins/line/blue.css">
	<link rel="stylesheet" href="css/icheck/skins/line/red.css">
	<link rel="stylesheet" href="css/icheck/skins/line/green.css">
	<link rel="stylesheet" href="css/main.css" media="screen">
	<script src="js/modernizr/modernizr.min.js"></script>
	<div class="container-fluid">
		<div class="row">
			<div class="navbar-header no-padding">
				<a class="navbar-brand" href="dashboard.php">Admin</a>
				<span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-ellipsis-v"></i>
				</button>
				<button type="button" class="navbar-toggle mobile-nav-toggle">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<!-- /.navbar-header -->
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					<!--<li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>-->
					<li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
					<li class="hidden-xs hidden-xs"><!-- <a href="#">My Tasks</a> --></li>
				</ul>
				<!-- /.nav navbar-nav -->
				<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					<li><a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
				<!-- /.nav navbar-nav navbar-right -->
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</nav>
