<?php
session_start();
include('class.messages.php');
$msg = new Messages();
if(!isset($_SESSION["user_id"]))
{
header("location:login.php");

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enroll-Admin</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/sweetalert2.min.css" rel="stylesheet" />
	<link href="assets/css/jquery.multiselect.css" rel="stylesheet" />
	<link href="assets/css/multi-select.css" rel="stylesheet" />
	<link href="assets/css/estyle.css" rel="stylesheet" />

	<!-- <link href="assets/css/datatables.min.css" rel="stylesheet" /> -->
	<link href="assets/css/bootstrap-multiselect.css" rel="stylesheet" />
	<link href="assets/css/select2.min.css" rel="stylesheet" />
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
/*
body {
   margin:0;
   padding:0;
   height:100%;
}
#wrapper {
   min-height:100%;
   position:relative;
}
.header {
  
   padding:10px;
}
.body {
   padding:10px;
   padding-bottom:60px;  
}
.footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   
   background:#6cf;
}*/
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('Loading_icon.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}



  
       /* .error{
            color: red;
        }*/
    </style>
</head>
<body>
	<div class="loader"></div>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Enroll</span> Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-power-off"></em>
					</a>
						
					</li>
					
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>