<?php
	include("php_header.php");
?>

<html class="csstransforms no-csstransforms3d csstransitions">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PRGX</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add-clients.css">
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" href="css/data_table.css">
		
	
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
	<script type="text/javascript" src="js/data_table.js"></script>
		
		
		
	<script type="text/javascript" src="js/main.js"></script>

</head>
<body>

<div id="s-wrap">
<header>
		<div class="s-inner s-relative">
			<a class="logo" href="#"><img src="images/prgxlogo.jpg" alt="PRGX" width="260px" height="40px"></a>
			<a id="s-menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
			<div id="s-navigation">
				<ul id="s-main-menu">
					<li class="parent 0"><a href="dashboard.php">Home</a></li>
					<li class="parent 1">
						<a href="#">Clients</a>
						<ul class="sub-menu">
							<li><a href="add_clients.php"> Add </a></li>
							<li><a href="modify_client.php"> Modify</a></li>
							<li><a href="#"> Delete</a></li>
							
						</ul>
					</li>
					<li class="parent 2">
						<a href="#">Build</a>
						<ul class="sub-menu">
							<li><a href="client_build_info.php"> Manage Build </a></li>
							<li><a href="client_build_jobsequence_template.php"> Build JobSequence</a></li>
							<li><a href="client_build_parameters_template.php"> Build Parameters</a></li>
							
						</ul>
					</li>
					<li class="parent 3">
						<a href="#">Reports</a>
						<ul class="sub-menu">
							<li><a href="report_test.php"> Create Reports </a></li>
							<li><a href="#"> View Reports</a></li>
						</ul>
					</li>
					<?php 
					if($_SESSION['designation']=="admin")
					{
						echo "<li class='parent 4'>
						<a href='#'>Users</a>
						<ul class='sub-menu'>
							<li><a href='add_users.php'> Add User</a></li>
							<li><a href='manage_users.php'> Manage User</a></li>
						</ul>
					</li>
						";
					}
					?>
					<li class="parent 5">
						<a href="#">Account</a>
						<ul class="sub-menu">
						<li><a href="change_password.php">Change Password </a></li>
							<li><a href="logout.php">Logout </a></li>
							
						</ul>
					</li>
					
					
				</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<hr>
	</header>
	
	
	
	
</html>