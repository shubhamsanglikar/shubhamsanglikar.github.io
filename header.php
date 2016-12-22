

<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PRGX</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    <!-- Bootsrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add-clients.css">
		<link rel="stylesheet" href="css/materialize.min.css">
		
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

</head>
<body>
<?php
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}
$isAdmin=0;

	if($_SESSION['designation']=="admin")
	{
		$isAdmin=1;
	}	
	
	
?>
<div id="s-wrap">
<header>
		<div class="s-inner s-relative">
			<a class="logo" href="#"><img src="images/prgxlogo.jpg" alt="PRGX" width="260px" height="40px"></a>
			<a id="s-menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
			<div id="s-navigation">
				<ul id="s-main-menu">
					<li class="parent 0"><a href="home.php">Home</a></li>
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
							
						</ul>
					</li>
					<li class="parent 3">
						<a href="#">Reports</a>
						<ul class="sub-menu">
							<li><a href="report_test.php"> Create Reports </a></li>
							<li><a href="#"> View Reports</a></li>
						</ul>
					</li>
					<li class="parent 4">
						<a href="#">Account</a>
						<ul class="sub-menu">
						<li><a href="change_password.php">Change Password </a></li>
							<li><a href="logout.php">Logout </a></li>
							
						</ul>
					</li>
					<?php 
					if($isAdmin==1)
					{
						echo "<li class='parent 5'>
						<a href='#'>Users</a>
						<ul class='sub-menu'>
							<li><a href='add_users.php'> Add User</a></li>
							<li><a href='manage_users.php'> Manage User</a></li>
						</ul>
					</li>
						</li>";
					}
					
					?>
					
				</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<hr>
	</header>
	
	
	
	
</html>